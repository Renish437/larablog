<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Url;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Profile extends Component
{
    #[Url()]
    public $tab = null;
    public $tabname ="personal_details";

    public $name, $email, $username,$bio;
   
//    protected $queryString = ['tab'=>['keep' => true]];
    
    public function selectedTab($tab){
        $this->tab = $tab;
        $this->tabname = $tab;

   
    }
    public function mount(){
        $this->tab = Request('tab') ? Request('tab') : $this->tabname;

        //Populate
             $user = User::findOrFail(Auth::user()->id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->username = $user->username;
        $this->bio = $user->bio;
    }
    public function updateProfile(){
        $user = User::findOrFail(Auth::user()->id);
        $this->validate([
            'name' => 'required',   
           
            'username' => 'required|unique:users,username,'.$user->id,
            
        ]);
        $user->name = $this->name;
        $user->username = $this->username;
        $user->bio = $this->bio;
        $updated=$user->save();
        sleep(0.5);
        if($updated){
$this->dispatch('toastMagic', 
    status: 'success',
    title: 'Profile Updated Successfully',
    options: [
        'showCloseBtn' => true,
        'progressBar' => true,
        'backdrop' => true,
        'positionClass' => 'toast-top-left',

    ]
);$this->dispatch('updatedUserInfo');
// $this->success('Profile Updated Successfully');
        }else{
                 $this->dispatch('toastMagic',
    status: 'error',
    title: 'Error Updating Profile',
    
    options: [
        'showCloseBtn' => true,
        'progressBar' => true,
        'backdrop' => true,
        'positionClass' => 'toast-top-right'
    ]);
        }
    }
    public function render()
    {
        return view('livewire.admin.profile',[
            'user'=>User::find(Auth::user()->id)
        ]);
    }
}
