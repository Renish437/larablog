<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function adminDashboard(Request $request){
        return view('back.pages.dashboard');
    }
    public function logoutHandler(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return to_route('admin.login')->with('success','Successfully logged out');
    }
}
