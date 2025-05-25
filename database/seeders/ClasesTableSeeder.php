<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('clases')->insert([
            [
                'nombre' => 'Clase 1',
                'grupo_id' => 1,
            ],
        ]);
    }
}
