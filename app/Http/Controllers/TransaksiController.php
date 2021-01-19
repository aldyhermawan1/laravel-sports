<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function transaksi(){
        $user = Auth::user();
        if ($user['aksesUser']=='member') {
            $transaksi = DB::table('transaksi')
                ->join('jadwal','transaksi.idTransaksi','=','jadwal.idTransaksi')
                ->join('lapangan','jadwal.idLapangan','=','lapangan.idLapangan')
                ->join('venue','lapangan.idVenue','=','venue.idVenue')
                ->join('user','transaksi.idMember','=','user.idUser')
                ->where('transaksi.idMember','=',$user['idUser'])
                ->orderBy('transaksi.idTransaksi','asc')
                ->get();
            return view('transaksiDetail',['transaksi'=>$transaksi, 'user'=>$user]);
        }else{
            if($user['aksesUser']=='admin'){
                $venue = DB::table('venue')->join('user', 'venue.idPemilik', '=', 'user.idUser')->get();
            }elseif($user['aksesUser']=='owner'){
                $venue = DB::table('venue')->join('user', 'venue.idPemilik', '=', 'user.idUser')->where('venue.idPemilik',$user['idUser'])->get();
            }
            return view('transaksi',['venue'=>$venue, 'user'=>$user]);
        }
    }
    public function transaksiDetail($idVenue){
        $user = Auth::user();
        $transaksi = DB::table('transaksi')
            ->join('jadwal','transaksi.idTransaksi','=','jadwal.idTransaksi')
            ->join('lapangan','jadwal.idLapangan','=','lapangan.idLapangan')
            ->join('venue','lapangan.idVenue','=','venue.idVenue')
            ->join('user','transaksi.idMember','=','user.idUser')
            ->where('venue.idVenue','=',$idVenue)
            ->orderBy('transaksi.idTransaksi','asc')
            ->get();
        return view('transaksiDetail',['transaksi'=>$transaksi, 'user'=>$user]);
    }
    public function doLunas($idVenue, $idTransaksi){
        DB::table('transaksi')->where('idTransaksi',$idTransaksi)->update([
            'lunasTransaksi' => 'lunas'
        ]);
        return redirect()->route('transaksiDetail', [$idVenue])->with('success','Transaksi Lunas!');
    }
    public function doBatal($idVenue, $idTransaksi){
        DB::table('transaksi')->where('idTransaksi',$idTransaksi)->update([
            'lunasTransaksi' => 'batal'
        ]);
        return redirect()->route('transaksiDetail', [$idVenue])->with('success','Transaksi dibatalkan!');
    }
    public function doBukti($idTransaksi, Request $request){
        $file = time().".".$request->file('bukti')->getClientOriginalExtension();
        $request->file('bukti')->move(public_path('images/transaksi'), $file);
        DB::table('transaksi')->where('idTransaksi',$idTransaksi)->update([
            'buktiTransaksi' => $file,
            'lunasTransaksi' => 'proses'
        ]);
        return redirect('/transaksi')->with('success','Bukti pembayaran telah di upload!');
    }
}
