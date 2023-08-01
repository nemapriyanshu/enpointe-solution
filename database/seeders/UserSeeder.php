<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'User1',
                'email' => 'customer1@gmail.com',
                'password' => Hash::make('Admin@123'),
                'role_name' => 'customer'
            ],
            [
                'name' => 'User1',
                'email' => 'customer2@gmail.com',
                'password' => Hash::make('Admin@123'),
                'role_name' => 'customer'
            ],
            [
                'name' => 'User1',
                'email' => 'customer3@gmail.com',
                'password' => Hash::make('Admin@123'),
                'role_name' => 'customer'
            ],
            [
                'name' => 'User1',
                'email' => 'banker1@gmail.com',
                'password' => Hash::make('Admin@123'),
                'role_name' => 'banker'
            ],
            [
                'name' => 'User1',
                'email' => 'banker2@gmail.com',
                'password' => Hash::make('Admin@123'),
                'role_name' => 'banker'
            ],
        ];
        foreach($userData as $user){
            User::create($user);
        }
    }
}
