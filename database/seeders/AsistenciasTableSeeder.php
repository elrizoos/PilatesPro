<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AsistenciasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('asistencias')->insert([
            [
                'reserva_id' => 1,
                'fecha' => '2024-02-26',
                'asistio' => 0,
            ],
        ]);
    }
}
