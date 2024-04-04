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
                'fecha' => '2024-02-26',
                'hora_inicio' => '12:00:00',
                'hora_fin' => '13:00:00',
                'grupo_id' => 1,
            ],
        ]);
    }
}
