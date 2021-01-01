<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PesanController extends Controller
{
    public function pesan(){
        $user = Auth::user();
        $venue = DB::table('venue')->join('user', 'venue.idPemilik', '=', 'user.idUser')->get();
        return view('pesan',['venue'=>$venue, 'user'=>$user]);
    }
    public function jadwal($idVenue){
        $user = Auth::user();
        $lapangan = DB::table('lapangan')->where('idVenue','=',$idVenue)->get('namaLapangan');
        $jadwal = DB::table('jadwal')
            ->join('transaksi', 'transaksi.idTransaksi', '=', 'jadwal.idTransaksi')
            ->join('lapangan', 'lapangan.idLapangan', '=', 'jadwal.idLapangan')
            ->join('venue', 'venue.idVenue', '=', 'lapangan.idVenue')
            ->where('transaksi.lunasTransaksi', '=', 'lunas')
            ->where('jadwal.mulaiJadwal', '>', 'NOW()')
            ->where('venue.idVenue', '=', $idVenue)
            ->orderBy('jadwal.mulaiJadwal', 'asc')
            ->get();
        return view('jadwal',['jadwal'=>$jadwal, 'user'=>$user, 'idVenue'=>$idVenue, 'lapangan'=>$lapangan]);
    }
    public function doInsertPesan($idVenue, Request $request){
        $user = Auth::user();
        #INSERT TRANSAKSI
        $lapangan = DB::table('lapangan')->where('idVenue','=',$idVenue)->where('namaLapangan','=',$request->lapangan)->get();
        $rawmulai = Carbon::parse($request->mulai);
        $mulai = $rawmulai->format('Y-m-d H:i:s');
        $selesai = $rawmulai->addHours($request->durasi)->format('Y-m-d H:i:s');
        $total = $request->durasi * $lapangan[0]->hargaLapangan;
        DB::table('transaksi')->insert([
            'idMember' => $user['idUser'],
            'totalTransaksi' => $total,
            'lunasTransaksi' => 'belum'
            ]);
        #INSERT JADWAL
        $idTransaksi = DB::table('transaksi')->max('idTransaksi');
        DB::table('jadwal')->insert([
            'mulaiJadwal' => $mulai,
            'selesaiJadwal' => $selesai,
            'idLapangan' => $lapangan[0]->idLapangan,
            'idTransaksi' => $idTransaksi
        ]);
            #INSERT BUKTI PEMBAYARAN KALAU ADA
        if ($request->file('gambar')) {
            $file = $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path('images/venue'), $file);
            DB::table('transaksi')->where('idTransaksi',$idTransaksi)->update([
                'buktiTransaksi' => $file,
                'lunasTransaksi' => 'proses'
            ]);
        }
        return redirect('/transaksi')->with('success','Pesanan telah diajukan!, silahkan selesaikan pembayaran.');
    }
}
