<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Sawastacks\Utils\Kropify;

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
    public function profileView(Request $request){
     $user = Auth::user();
     return view('back.pages.profile',compact('user'));

    }
    public function settingsView(Request $request){
        return view('back.pages.settings');
    }
    public function categoriesView(Request $request){
        return view('back.pages.category.categories');

    }

 

    

}
