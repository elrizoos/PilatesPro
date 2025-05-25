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
            ['titulo' => 'Sección uno', 'tipo' => '2ciz'],
            ['titulo' => 'Sección dos', 'tipo' => '4cel2i'],
            ['titulo' => 'Sección tres', 'tipo' => '1c'],
            ['titulo' => 'Sección cuatro', 'tipo' => '2cid'],
        ];

        DB::table('seccions')->insert($secciones);
    }
}
