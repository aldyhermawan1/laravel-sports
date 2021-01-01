<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VenueController extends Controller
{
    public function venue(){
        $user = Auth::user();
        if($user['aksesUser']=='admin'){
            $venue = DB::table('venue')->join('user', 'venue.idPemilik', '=', 'user.idUser')->get();
        }elseif($user['aksesUser']=='owner'){
            $venue = DB::table('venue')->join('user', 'venue.idPemilik', '=', 'user.idUser')->where('venue.idPemilik',$user['idUser'])->get();
        }
        return view('venue',['venue'=>$venue, 'user'=>$user]);
    }
    public function doInsertVenue(Request $request){
        $user = Auth::user();
        $file = $request->file('gambar')->getClientOriginalName();
        $request->file('gambar')->move(public_path('images/venue'), $file);

        DB::table('venue')->insert([
            'namaVenue' => $request->nama,
            'alamatVenue' => $request->alamat,
            'telpVenue' => $request->telp,
            'emailVenue'=> $request->email,
            'bukaVenue'=> $request->buka,
            'tutupVenue'=> $request->tutup,
            'gambarVenue'=> $file,
            'idPemilik'=> $user['idUser']
        ]);
        return redirect('/venue')->with('success','Data terdaftar!');
    }
    public function doDeleteVenue($idVenue){
        DB::table('venue')->where('idVenue',$idVenue)->delete();
        return redirect('/venue')->with('success','Data telah dihapus!');
    }

    public function lapangan($idVenue){
        $user = Auth::user();
        $lapangan = DB::table('lapangan')->join('venue','venue.idVenue','=','lapangan.idVenue')->where('lapangan.idVenue',$idVenue)->get();
        return view('lapangan',['lapangan'=>$lapangan, 'user'=>$user, 'idVenue'=>$idVenue]);
    }
    public function doInsertLapangan($idVenue, Request $request){
        DB::table('lapangan')->insert([
            'namaLapangan' => $request->nama,
            'jenisLapangan' => $request->jenis,
            'hargaLapangan' => $request->harga,
            'idVenue'=> $idVenue
        ]);
        return redirect()->route('lapangan', [$idVenue])->with('success','Data terdaftar!');
    }
    public function doUpdateLapangan($idVenue, $idLapangan, Request $request){
        DB::table('lapangan')->where('idLapangan',$idLapangan)->update([
            'namaLapangan' => $request->nama,
            'jenisLapangan' => $request->jenis,
            'hargaLapangan' => $request->harga,
        ]);
        return redirect()->route('lapangan', [$idVenue])->with('success','Data telah diubah!');
    }
    public function doDeleteLapangan($idVenue, $idLapangan){
        DB::table('lapangan')->where('idLapangan',$idLapangan)->delete();
        return redirect()->route('lapangan', [$idVenue])->with('success','Data telah dihapus!');
    }
}
