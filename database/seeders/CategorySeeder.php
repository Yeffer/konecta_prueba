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
        DB::table('categories')->insert([
            'name' => 'Alcohol'
        ]);

        DB::table('categories')->insert([
            'name' => 'Lacteos'
        ]);

        DB::table('categories')->insert([
            'name' => 'Bebidas Calientes'
        ]);

        DB::table('categories')->insert([
            'name' => 'Bebidas Frias'
        ]);

        DB::table('categories')->insert([
            'name' => 'Otro'
        ]);
    }
}
