<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(){
        $user = Auth::user();
        if($user['aksesUser']=='admin'){
            return view('adminDashboard',['user'=>$user]);
        }elseif($user['aksesUser']=='owner'){
            return view('ownerDashboard',['user'=>$user]);
        }elseif($user['aksesUser']=='member'){
            return view('memberDashboard',['user'=>$user]);
        }
    }
}
