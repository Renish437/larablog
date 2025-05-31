<?php

namespace App\Http\Controllers;

use App\UserStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function loginForm(){
        return view('back.pages.auth.login');
    }
    public function forgotForm(){
        return view('back.pages.auth.forgot');
    }
    public function loginHandler(Request $request){
       $fieldType = filter_var($request->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
       if($fieldType == 'email'){
           $request->validate([
               'login_id' => 'required|email|exists:users,email',
               'password' => 'required|min:4'
           ],[
               'login_id.required' => 'Enter your email or username',
               'login_id.email' => 'Enter a valid email address',
               'login_id.exists' => 'No account found with this email address',
              
           ]);
       }else{
           $request->validate([
               'login_id' => 'required|exists:users,username',
               'password' => 'required|min:4'
           ],[
               'login_id.required' => 'Enter your email or username',
               'login_id.exists' => 'No account found with this username',
           ]);
       }

       $credentials = array(
           $fieldType => $request->login_id,
           'password' => $request->password
       );
       if(Auth::attempt($credentials)){
          // check if account is active
          if(Auth::user()->status == UserStatus::Inactive){
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return to_route('admin.login')->with('error','Current account is not active');
          }
          if(Auth::user()->type == UserStatus::Pending){
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return to_route('admin.login')->with('error','Current account is pending for approval');
          }
          if(Auth::user()->type == UserStatus::Rejected){
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return to_route('admin.login')->with('error','Current account is rejected');
          }
          
           return redirect()->intended('admin/dashboard');
       }
       else{
        return to_route('admin.login')->with('error','Invalid credentials');
       }
    }

  
}
