<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ["nom" => "sans catégorie", "created_at" => now() ],
            ["nom" => "paysages", "created_at" => now() ],
            ["nom" => "voitures", "created_at" => now() ]
        ]);
    }
}
