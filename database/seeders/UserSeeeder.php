<?php

namespace Database\Seeders;

use App\Models\User;
use App\UserStatus;
use App\UserType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email'=>'admin@gmail.com',
            'password' => Hash::make('password'),
            'type' => UserType::SuperAdmin,
            'status' => UserStatus::Active
        ]);
    }
}
