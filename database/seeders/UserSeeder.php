<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => "Day Admin",
                'username' => 'dayadmin',
                'email' => 'dayadmin@teste.com',
                'role' => 'admin',
                'status' => 'active',
                'password' => bcrypt('password')
            ],
            [
                'name' => "Day Nutricionist",
                'username' => 'daynutricionist',
                'email' => 'daynutricionist@teste.com',
                'role' => 'nutricionist',
                'status' => 'active',
                'password' => bcrypt('password')
            ],
            [
                'name' => "Day Trainer",
                'username' => 'daytrainer',
                'email' => 'daytrainer@teste.com',
                'role' => 'trainer',
                'status' => 'active',
                'password' => bcrypt('password')
            ],
            [
                'name' => "Day Patient",
                'username' => 'daypatient',
                'email' => 'daypatient@teste.com',
                'role' => 'patient',
                'status' => 'active',
                'password' => bcrypt('password')
            ]
            ]);
    }
}
