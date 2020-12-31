<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function user(){
        $user = Auth::user();
        return view('user',['user'=>$user]);
    }

    public function allUser(){
        $user = Auth::user();
        $allUser = DB::table('user')->get();
        return view('adminAllUser',['allUser'=>$allUser], ['user'=>$user]);
    }

    public function doInsertUser(Request $request){
        DB::table('user')->insert([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'namaUser' => $request->nama,
            'telpUser' => $request->telp,
            'emailUser'=> $request->email,
            'aksesUser'=> $request->akses
        ]);
        return redirect('/allUser')->with('success','Data sudah terdaftar!');
    }

    public function doUpdateAllUser($idUser, Request $request){
        if($request->password == $request->Cpassword){
            DB::table('user')->where('idUser',$idUser)->update([
                'username' => $request->username,
                'namaUser' => $request->nama,
                'telpUser' => $request->telp,
                'emailUser' => $request->email,
                'password' => bcrypt($request->password)
            ]);
            return redirect('/allUser')->with('success','Data telah di update!');
        }else{
            return redirect('/allUser')->with('error','Password tidak sama');
        }
    }

    public function doDeleteUser($idUser){
        DB::table('user')->where('idUser',$idUser)->delete();
        return redirect('/allUser')->with('success','Data telah dihapus!');
    }

    public function doUpdateUser($idUser, Request $request){
        if($request->password == $request->Cpassword){
            DB::table('user')->where('idUser',$idUser)->update([
                'username' => $request->username,
                'namaUser' => $request->nama,
                'telpUser' => $request->telp,
                'emailUser' => $request->email,
                'password' => bcrypt($request->password)
            ]);
            return redirect('/user')->with('success','Data telah di update!');
        }else{
            return redirect('/user')->with('error','Password tidak sama');
        }
    }

}
