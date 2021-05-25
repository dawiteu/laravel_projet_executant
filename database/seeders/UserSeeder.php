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
            // super admin ; 
            [
                "name" => "Tararuj", 
                "email" => "admin@exo.be", 
                "password" => Hash::make('admin1'),
                "prenom" => "Dawid", 
                "age" => 1997, 
                "avatar_id" => 1, 
                "role_id" => 1,
                "created_at" => now()
            ],
            // wembaster
            [
                "name" => "Tararuj", 
                "email" => "webm@exo.be", 
                "password" => Hash::make('webm1'),
                "prenom" => "Dawid", 
                "age" => 1994, 
                "avatar_id" => 1, 
                "role_id" => 2,
                "created_at" => now()
            ],
            // user 
            [
                "name" => "us", 
                "email" => "us@exo.be", 
                "password" => Hash::make('user1'),
                "prenom" => "Joseph",  
                "age" => 2001, 
                "avatar_id" => 1, 
                "role_id" => 3,
                "created_at" => now()
            ],
        ]);
    }
}
