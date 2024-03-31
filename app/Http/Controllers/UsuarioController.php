<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;

class UsuarioController extends Controller
{
    protected function guardarCambios(Request $request)
    {
        $formulario = $request->tipo_informacion;
        //dd($formulario);
        //dd($request->all());

        switch ($formulario) {

            case "informacionGeneral":
                $validator = Validator::make($request->all(), [
                    'nombre' => ['required', 'string', 'max:255'],
                    'apellidos' => ['required', 'string', 'max:255'],
                ]);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $usuario = User::where('email', $request->usuario)->first();
                //dd($usuario);
                if (!$usuario) {
                    return redirect()->back()->withErrors('Usuario no encontrado.')->withInput();
                }
                $data = $request->except(['usuario', 'tipo_informacion']);
                //dd($data);
                try {
                    $usuario->update($data);
                } catch (\Throwable $th) {
                    $th->getMessage();
                }
                return redirect()->back()->with('success', 'Información actualizada correctamente.');
                break;
            case "informacionContacto":
                if ($request->email === $request->usuario) {
                    $validator = Validator::make($request->all(), [
                        'telefono' => ['required', 'regex:/^[6789]\d{8}$/'],

                    ]);
                } else {
                    $validator = Validator::make($request->all(), [
                        'telefono' => ['required', 'regex:/^[6789]\d{8}$/'],
                        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    ]);

                }

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $usuario = User::where('email', $request->usuario)->first();
                //dd($usuario);
                if (!$usuario) {
                    return redirect()->back()->withErrors('Usuario no encontrado.')->withInput();
                }
                $data = $request->except(['usuario', 'tipo_informacion']);
                //dd($data);
                try {
                    $usuario->update($data);
                } catch (\Throwable $th) {
                    $th->getMessage();
                }
                return redirect()->back()->with('success', 'Información actualizada correctamente.');
                break;
        }
    }
    public function delete($id){
        
    }
    
}
