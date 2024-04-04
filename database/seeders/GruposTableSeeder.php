<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GruposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('grupos')->insert([
            [
                'nombre' => 'Grupo 1',
                'descripcion' => 'Primer grupo de prueba',
                'profesor_id' => 3,
            ],
        ]);
    }
}
