<?php

namespace App\Http\Controllers;

use App\Helpers\CMail;
use App\Models\User;
use App\UserStatus;
use App\UserType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    //
    public function loginForm(){
        return view('back.pages.auth.login');
    }
    public function forgotForm(){
        return view('back.pages.auth.forgot');
    }
    public function registerForm(){
        return view('back.pages.auth.register');
    }
    public function registerHandler(Request $request){
        $request->validate([
            'name' => 'required|min:3|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:4',
            'password_confirmation' => 'required|same:password',
        ],[
            'name.required' => 'Enter your name',
            'email.required' => 'Enter your email address',
            'email.email' => 'Enter a valid email address',
            'email.unique' => 'Email address already exists',
            'password.required' => 'Enter your password',
            'password.min' => 'Password must be at least 4 characters',
            'password_confirmation.required' => 'Confirm your password',
            'password_confirmation.same' => 'Passwords do not match',
        ]
        );

        User::create([
            'username' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => UserStatus::Active,
             'name'=> $request->name,
            'type' => UserType::Admin,
        ]);
        return to_route('admin.login')->with('success','Account created successfully');
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

public function sendPasswordResetLink(Request $request)
{
    $request->validate([
        'email' => 'required|email|exists:users,email'
    ], [
        'email.required' => 'The email field is required',
        'email.email' => 'Enter a valid email address',
        'email.exists' => 'No account found with this email address',
    ]);

    // Get user details
    $user = User::where('email', $request->email)->first();
    // Generate URL-safe token
    $token = Str::random(64); // Use raw random string (URL-safe)
    Log::debug('Generated token for password reset', ['email' => $user->email, 'token' => $token]);

    $oldToken = DB::table('password_reset_tokens')
        ->where('email', $user->email)
        ->first();

    if ($oldToken) {
        DB::table('password_reset_tokens')
            ->where('email', $user->email)
            ->update([
                'token' => $token,
                'created_at' => Carbon::now()
            ]);
        Log::debug('Updated existing token', ['email' => $user->email, 'token' => $token]);
    } else {
        DB::table('password_reset_tokens')->insert([
            'email' => $user->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        Log::debug('Inserted new token', ['email' => $user->email, 'token' => $token]);
    }

    // Create clickable action link
    $actionLink = route('admin.reset.password', ['token' => $token]);
    Log::debug('Generated action link', ['link' => $actionLink]);

    $data = [
        'user' => $user,
        'actionLink' => $actionLink,
        'company_name' => config('app.name', 'Larablog'),
        'support_email' => config('mail.from.address', 'support@larablog.com')
    ];

    $mail_body = view('email-templates.forgot-template', $data)->render();
    $mailConfig = [
        'recipient_address' => $user->email,
        'recipient_name' => $user->name,
        'from_address' => config('mail.from.address', 'no-reply@larablog.com'),
        'from_name' => config('mail.from.name', 'Larablog'),
        'subject' => 'Reset Password',
        'body' => $mail_body
    ];

    if (CMail::send($mailConfig)) {
        Log::info('Password reset email sent', ['email' => $user->email]);
        return to_route('admin.forgot')->with('success', 'We have sent you an email to reset your password');
    } else {
        Log::error('Failed to send password reset email', ['email' => $user->email]);
        return to_route('admin.forgot')->with('error', 'Something went wrong while sending email');
    }
}
    public function resetPasswordForm($token){
        
      // check if token is valid
      $isTokenExists = DB::table('password_reset_tokens')
      ->where('token', $token)
      ->first();
      if ($isTokenExists) {
        return view('back.pages.auth.reset', compact('token'));
      } else {
        return to_route('admin.forgot')->with('error', 'Invalid token');
      }
    }
public function resetPasswordHandler(Request $request)
    {
        // Log the incoming request
        Log::debug('Reset password request received', $request->all());

        // Validate the request
        try {
            $request->validate([
                'token' => 'required',
                'new_password' => 'required|min:5|same:new_password_confirmation',
                'new_password_confirmation' => 'required'
            ], [
                'token.required' => 'The token is required',
                'new_password.required' => 'The password field is required',
                'new_password.min' => 'Password must be at least 5 characters',
                'new_password.same' => 'Password and confirmation password do not match',
                'new_password_confirmation.required' => 'The confirm password field is required',
            ]);
        } catch (ValidationException $e) {
            Log::warning('Validation failed', ['errors' => $e->errors()]);
            return redirect()->route('admin.reset.password', $request->token ?? '')
                ->withErrors($e->errors())
                ->withInput();
        }

        try {
            // Log validation passed
            Log::debug('Validation passed for token: ' . $request->token);

            // Check if the token exists
            $dbToken = DB::table('password_reset_tokens')
                ->where('token', $request->token)
                ->first();

            if (!$dbToken) {
                Log::warning('Invalid or expired token: ' . $request->token);
                return redirect()->route('admin.reset.password', $request->token)
                    ->with('error', 'Invalid or expired token');
            }

            // Log token found
            Log::debug('Token found for email: ' . $dbToken->email);

            // Get user details
            $user = User::where('email', $dbToken->email)->first();
            if (!$user) {
                Log::warning('No user found for email: ' . $dbToken->email);
                return redirect()->route('admin.reset.password', $request->token)
                    ->with('error', 'No user found with the associated email');
            }

            // Log user found
            Log::debug('User found: ' . $user->email);

            // Update user password
            User::where('email', $user->email)->update([
                'password' => Hash::make($request->new_password)
            ]);

            // Log password updated
            Log::debug('Password updated for user: ' . $user->email);

            // Delete the token
            DB::table('password_reset_tokens')
                ->where('email', $user->email)
                ->where('token', $request->token)
                ->delete();

            // Log token deleted
            Log::debug('Token deleted for user: ' . $user->email);

            // Send the email notification
            $data = [
                'user' => $user,
                'company_name' => config('app.name', 'Larablog'),
                'support_email' => config('mail.from.address', 'support@larablog.com'),
                'loginLink' => route('admin.login')
            ];

            // Render the email template
            $mail_body = view('email-templates.password-changed-template', $data)->render();
            Log::debug('Email template rendered for user: ' . $user->email);

            $mailConfig = [
                'recipient_address' => $user->email,
                'recipient_name' => $user->name,
                'from_address' => config('mail.from.address', 'no-reply@larablog.com'),
                'from_name' => config('mail.from.name', 'Larablog'),
                'subject' => 'Password Changed Successfully',
                'body' => $mail_body
            ];

            // Attempt to send email with timeout
            set_time_limit(30);
            if (CMail::send($mailConfig)) {
                Log::info('Password reset email sent to ' . $user->email);
                return redirect()->route('admin.login')->with('success', 'Password reset successfully');
            } else {
                Log::error('Failed to send password reset email to ' . $user->email);
                return redirect()->route('admin.login')
                    ->with('success', 'Password reset successfully, but failed to send confirmation email.');
            }
        } catch (\Exception $e) {
            Log::error('Error in resetPasswordHandler: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);
            return redirect()->route('forgot')
                ->with('error', 'An unexpected error occurred. Please request a new password reset link.');
        }
    }


}
