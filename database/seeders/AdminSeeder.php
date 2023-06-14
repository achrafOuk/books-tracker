<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        //
        $factoryUsers = [
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => '123456', // password
                'role' => 'admin'
            ],

            [
                'name' => 'user',
                'email' => 'user@user.com',
                'password' => '123456', // password
                'role' => 'user'
            ],
        ];

        foreach ($factoryUsers as $user) {
            $newUser =  User::factory()->create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make( $user['password'] ),
            ]);
            $newUser->assignRole($user['role']);
        }
    }
}
