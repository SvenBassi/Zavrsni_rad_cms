<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([

    
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin12345'),
                'role' => '1'
          
    
        ]);
  
    }
}
