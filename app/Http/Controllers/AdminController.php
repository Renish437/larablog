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
    // public function updateProfilePicture(Request $request){
    //   $user = User::findOrFail(Auth::user()->id);
    //   $path = 'images/users/';
    //   $file =$request->file('profilePictureFile');
    //   $old_picture = $user->getAttributes()['picture'];
    //   $filename = 'IMG_'.uniqid().'.'.'png';

    // try {
    //       $upload = Kropify::getFile($filename)->save($path);

    //   if($upload){
    //     if($old_picture != null && File::exists(public_path($path.$old_picture))){
    //       File::delete(public_path($path.$old_picture));
    //     }
    //     $user->update(['picture'=>$filename]);
    //     return response()->json(['status'=>1,'success'=>'Profile picture updated successfully']);
    //   }else{
    //     return response()->json(['status'=>0,'error'=>'Error updating profile picture']);
    //   }
    // }catch(Exception $e){
    //   return response()->json(['status'=>0,'error'=>$e->getMessage()]);
    // }
    // }
public function updateProfilePicture(Request $request)
{
     dd($request->all());
    // Ensure JSON response for AJAX requests
    if ($request->ajax() && !Auth::check()) {
        return response()->json([
            'status' => 0,
            'message' => 'Unauthorized: Please log in again'
        ], 401);
    }

 

    $user = User::findOrFail(Auth::id());
    $path = 'images/users/';
    $file = $request->file('profilePictureFile');
    $old_picture = $user->picture;
    $filename = 'IMG_' . uniqid() . '.' . $file->getClientOriginalExtension();

    try {
        $upload = Kropify::getFile($file, $filename)->maxWoH(255)->save($path);

        if ($upload) {
            if ($old_picture && File::exists(public_path($path . $old_picture))) {
                File::delete(public_path($path . $old_picture));
            }
            $user->update(['picture' => $filename]);
            $this->dispatch('toastMagic', [
                'status' => 'success',
                'title' => 'Profile Updated Successfully',
                'options' => [
                    'showCloseBtn' => true,
                    'progressBar' => true,
                    'backdrop' => false,
                    'positionClass' => 'toast-bottom-left',
                    'backgroundColor' => '#007bff',
                    'textColor' => '#ffffff',
                    'animation' => 'fadeInLeft',
                    'duration' => 3500,
                    'padding' => '20px',
                    'borderRadius' => '15px',
                    'boxShadow' => '0 6px 12px rgba(0,0,0,0.15)',
                    'fontFamily' => 'Helvetica, sans-serif',
                    'fontSize' => '16px',
                    'icon' => 'check-circle',
                ]
            ]);
            return response()->json([
                'status' => 1,
                'message' => 'Profile picture updated successfully',
                'data' => $filename
            ]);
        }

        return response()->json([
            'status' => 0,
            'message' => 'Error updating profile picture'
        ]);
    } catch (\Exception $e) {
        Log::error('Profile picture update failed: ' . $e->getMessage());
        return response()->json([
            'status' => 0,
            'message' => 'Server error: ' . $e->getMessage()
        ], 500);
    }
}

}
