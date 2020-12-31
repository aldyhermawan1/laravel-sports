<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function login(){
        return view('login');
    }

    public function doLogout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function doLogin(Request $request){
        $userdata = $request->only('username', 'password');
        if (Auth::attempt($userdata)){
            $request->session()->regenerate();
            return redirect('/');
        }
        else{
            return redirect('/login')->with('error','Data yang dimasukkan salah');
        }
    }

    public function register(){
        return view('register');
    }

    public function doRegister(Request $request){
        DB::table('user')->insert([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'namaUser' => $request->nama,
            'telpUser' => $request->telp,
            'emailUser'=> $request->email,
            'aksesUser'=> 'member'
        ]);
        return redirect('/login')->with('success','Data sudah terdaftar!');
    }
}
