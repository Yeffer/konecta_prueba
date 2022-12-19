<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert([
            'name' => 'Alcohol'
        ]);

        DB::table('category')->insert([
            'name' => 'Lacteos'
        ]);

        DB::table('category')->insert([
            'name' => 'Bebidas Calientes'
        ]);

        DB::table('category')->insert([
            'name' => 'Bebidas Frias'
        ]);
    }
}
