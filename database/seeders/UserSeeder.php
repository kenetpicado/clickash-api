<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Kenet Picado',
                'username' => 'kenetpicado1@gmail.com',
                'password' => Hash::make('password1A'),
                'is_root' => true,
            ],
            [
                'name' => 'Jairo Pan y Agua',
                'username' => 'jeypaniagua@gmail.com',
                'password' => Hash::make('password1A'),
                'is_root' => true,
            ],
        ];

        foreach ($users as $user) {
            \App\Models\User::create($user);
        }
    }
}
