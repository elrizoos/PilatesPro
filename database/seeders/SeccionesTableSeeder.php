<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeccionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $secciones = [
            ['titulo' => 'Sección uno', 'tipo' => 'imagen-derecha'],
            ['titulo' => 'Sección dos', 'tipo' => 'dos-imagenes'],
            ['titulo' => 'Sección tres', 'tipo' => 'imagen-izquierda'],
            ['titulo' => 'Sección cuatro', 'tipo' => 'sin-imagen'],
        ];

        DB::table('seccions')->insert($secciones);
    }
}
