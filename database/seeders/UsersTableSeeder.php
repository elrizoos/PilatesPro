<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'nombre' => 'admin',
                'apellidos' => 'admin',
                'dni' => '11111111A',
                'telefono' => '600000000',
                'email' => 'admin@gmail.com',
                'direccion' => 'turon',
                'fecha_nacimiento' => '1997-08-18',
                'password' => Hash::make('admin_24_admin'), // Suponiendo que este sea el hash de 'password'
                'tipo_usuario' => null,
            ],
            [
                'nombre' => 'alumno',
                'apellidos' => 'alumno',
                'dni' => '22222222B',
                'telefono' => '611111111',
                'email' => 'alumno@gmail.com',
                'direccion' => 'turon',
                'fecha_nacimiento' => '1997-08-18',
                'password' => Hash::make('alumno_24_alumno'), // Ajusta según corresponda
                'tipo_usuario' => 'alumno',
            ],
            [
                'nombre' => 'profesor',
                'apellidos' => 'profesor',
                'dni' => '22222222C',
                'telefono' => '611111141',
                'email' => 'profesor@gmail.com',
                'direccion' => 'turon',
                'fecha_nacimiento' => '1997-08-18',
                'password' => Hash::make('profesor_24_profesor'), // Ajusta según corresponda
                'tipo_usuario' => 'profesor',
            ],
        ]);
    }
}
