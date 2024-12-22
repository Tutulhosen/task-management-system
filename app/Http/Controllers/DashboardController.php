<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
     //logout
     public function custom_logout(){
        Auth::logout();
        return view('auth.login');
    }
}
