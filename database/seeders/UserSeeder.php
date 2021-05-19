<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            "name" => "admin", 
            "email" => "admin@admin.be", 
            "password" => Hash::make('admin1'),
            "prenom" => "Dawid", 
            "age" => 1997, 
            "avatar_id" => 1, 
            "role_id" => 1,
            "created_at" => now() 
        ]);
    }
}
