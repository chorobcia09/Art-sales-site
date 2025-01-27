<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Mateusz Chorab',
            'email' => 'admin@admin.com',
            'password' => Hash::make('adminadmin'),
            'role' => 'admin',
        ]);
        
        User::create([
            'name' => 'Tomasz Wiśniowski',
            'email' => 'user@user.com',
            'password' => Hash::make('useruser'),
        ]);

    }
}
