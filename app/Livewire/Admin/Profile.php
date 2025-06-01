<?php

namespace App\Livewire\Admin;

use App\Helpers\CMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithFileUploads;
use Masmerise\Toaster\Toaster;

class Profile extends Component
{
    use WithFileUploads;

    #[Url()]
    public $tab = null;
    public $tabname = "personal_details";

    public $name, $email, $username, $bio;

    public ?User $user; // Type hint User, nullable if not always set on mount

    public $current_password, $new_password, $new_password_confirmation;

    public $facebook, $twitter, $instagram, $linkedin, $github, $youtube;

    #[Rule('required|image|mimes:jpeg,png,jpg,gif,svg|max:2048')] // 2MB Max
    public $photo;

    //    protected $queryString = ['tab'=>['keep' => true]];

      public function mount()
    {
        $this->tab = Request('tab') ? Request('tab') : $this->tabname;

        //Populate
        $user = User::with('social_links')->findOrFail(Auth::user()->id);
        
        $this->name = $user->name;
        $this->email = $user->email;
        $this->username = $user->username;
        $this->bio = $user->bio;
        $this->user = Auth::user();

        if(!is_null($user->social_links)){
            $this->facebook = $user->social_links->facebook;
            $this->twitter = $user->social_links->twitter;
            $this->instagram = $user->social_links->instagram;
            $this->linkedin = $user->social_links->linkedin;
            $this->github = $user->social_links->github;
            $this->youtube = $user->social_links->youtube;
        }
    }
    public function updateSocialLinks(){
       
        $this->validate([
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'github' => 'nullable|url',
            'youtube' => 'nullable|url',

        ]);
       $this->user->social_links()->updateOrCreate(
            ['user_id' => $this->user->id], // Match by user_id
            [
                'facebook' => $this->facebook,
                'twitter' => $this->twitter,
                'instagram' => $this->instagram,
                'linkedin' => $this->linkedin,
                'github' => $this->github,
                'youtube' => $this->youtube,
            ]
        );

        $this->dispatch('toastMagic',
            status: 'success',
            title: 'Social links updated successfully',
            message: 'Social links updated successfully',
            options: [
                'showCloseBtn' => true,
                'progressBar' => true,
            ]
        );
    }
    public function selectedTab($tab)
    {
        $this->tab = $tab;
        $this->tabname = $tab;
    }

    public function updatePassword(){
        $this->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:5',
            'new_password_confirmation' => 'required|same:new_password',
        ]);

        $user = User::findOrFail(Auth::user()->id);
        if(!Hash::check($this->current_password, $user->password)){
              $this->dispatch('toastMagic',
                status: 'error',
                title: 'Password didn\'t match, Please try again',
                message: 'Password didn\'t match, Please try again',
                options: [
                    'showCloseBtn' => true,
                    'progressBar' => true,
                ]
            );
                 
       
        }else{
            $user->password = Hash::make($this->new_password);
           $updated = $user->save();
           if($updated){
               $this->dispatch('toastMagic',
                status: 'success',
                title: 'Password updated successfully',
                options: [
                    'showCloseBtn' => true,
                    'progressBar' => true,
                ]
            );
            $mailData = [
                'user' => $user,
                'new_password' => $this->new_password,
                'loginLink' => route('admin.login'),

            ];
            $mail_body = view('email-templates.password-changed-template', $mailData)->render();
            $mail_config = [
                'recipient_address' => $user->email,
                'recipient_name' => $user->name,
              
                'subject' => 'Password Changed',
                'body' => $mail_body,
            ];
            CMail::send($mail_config);
            //logout user
            Auth::logout();
            Session::flash('info', 'Your password has been successfully updated. Please log in with your new password.');
            $this->redirect(route('admin.login'));

        }
           else{
               $this->dispatch('toastMagic',
                status: 'error',
                title: 'Something went wrong, Please try again',
                options: [
                    'showCloseBtn' => true,
                    'progressBar' => true,
                ]);
           }
        }
        $this->reset('new_password', 'new_password_confirmation','current_password');
    }

    public function updatedPhoto()
    {
        $this->validate(); // This will validate the $photo property based on the #[Rule] attribute

        if (!$this->user) {
            $this->user = Auth::user(); // Ensure user is loaded
        }

        $currentPicturePathInDb = $this->user->getRawOriginal('picture');

        if ($currentPicturePathInDb && $this->photo) {

            if (!filter_var($currentPicturePathInDb, FILTER_VALIDATE_URL)) {
                Storage::disk('public')->delete($currentPicturePathInDb);
            }
        }

        // Store the new photo if one was uploaded
        if ($this->photo) {
            $newStoredPath = $this->photo->store('profile-photos', 'public');
            $this->user->picture = $newStoredPath; // Assign the raw path for saving
            $this->user->save();

            // session()->flash('message', 'Photo updated successfully!');
            $this->dispatch(
                'toastMagic',
                status: 'success',
                title: 'Profile Picture Updated Successfully',
                options: [
                    'showCloseBtn' => true,
                    'progressBar' => true,
                    'backdrop' => true,
                    'positionClass' => 'toast-top-left',
                ]
            );
            // Refresh user data in the component
            $this->user = $this->user->fresh();

            $this->photo = null;


            $this->dispatch('profile-photo-updated');
        }
    }
    public function triggerFileInput()
    {
        // Dispatch a browser event that JavaScript will listen for
        $this->dispatch('trigger-file-input-click');
    }
  
    public function updateProfile()
    {
        $user = User::findOrFail(Auth::user()->id);
        $this->validate([
            'name' => 'required',

            'username' => 'required|unique:users,username,' . $user->id,

        ]);
        $user->name = $this->name;
        $user->username = $this->username;
        $user->bio = $this->bio;
        $updated = $user->save();
        sleep(0.5);
        if ($updated) {
            $this->dispatch(
                'toastMagic',
                status: 'success',
                title: 'Profile Updated Successfully',
                options: [
                    'showCloseBtn' => true,
                    'progressBar' => true,
                    'backdrop' => true,
                    'positionClass' => 'toast-top-left',

                ]
            );
            $this->dispatch('updatedUserInfo');
            // $this->success('Profile Updated Successfully');
        } else {
            $this->dispatch(
                'toastMagic',
                status: 'error',
                title: 'Error Updating Profile',

                options: [
                    'showCloseBtn' => true,
                    'progressBar' => true,
                    'backdrop' => true,
                    'positionClass' => 'toast-top-right'
                ]
            );
        }
    }

    public function render()
    {
        return view('livewire.admin.profile', [
            'user' => User::find(Auth::user()->id)
        ]);
    }
}
