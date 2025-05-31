<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class TopUserInfo extends Component
{
    #[On('updatedUserInfo')]
    public function render()
    {
        return view('livewire.admin.top-user-info',[
            'user'=>User::findOrFail(Auth::user()->id)
        ]);
    }
}
