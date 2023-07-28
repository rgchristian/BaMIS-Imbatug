<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([

            //Barangay Staff
            [
                'name' => 'Barangay Staff',
                'username' => 'barangay staff',
                'email' => 'imbatugstaff@gmail.com',
                'password' => Hash::make('111'),
                'status' => 'active',
                'role' => 'admin'
            ]

        ]);
        
    }
}
