<?php

namespace App\Http\Controllers;

use App\Models\Panel;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\RegisterController;
use App\Models\Reserva;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;

class PanelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $datos;
    public function __construct()
    {
        $this->datos = [
            'alumnos' => User::where('tipo_usuario', '=', 'alumno')->get(),
            'profesores' => User::where('tipo_usuario', '=', 'profesor')->get(),
            'usuarios' => User::all(),
        ];
    }
    public function index()
    {
        $alumnos = User::where('tipo_usuario', '=', 'alumno')->get();
        $profesores = User::where('tipo_usuario', '=', 'profesor')->get();
        $reservas = Reserva::get();
        $tipo = "";

        //depuracion
        //dd('Alumnos: ' . $alumnos);
        //dd('Profesores: ' . $profesores);
        //dd('Reservas: ' . $reservas);

        return view('panel-control', compact(['alumnos', 'profesores', 'reservas', 'tipo']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Panel $panel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Panel $panel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Panel $panel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Panel $panel)
    {
        //
    }

    public function mostrarContenido($tipo)
    {
        $datos = $this->datos;
        $ruta = 'admin.' . $tipo;
        return view($ruta, compact('tipo', 'datos'));
    }

    public function crearUsuario(Request $request)
    {
        $registerController = new RegisterController();
        $data = $request->all();
        $data['password_confirmation'] = $data['password'];
        $validator = $registerController->validar($data);
        if ($validator->fails()) {
            //dd('error: ' . var_dump($data));
            return redirect()->back()->withErrors($validator)->withInput();
        }
        //dd('funciona: ' . var_dump($data));
        $usuario = $registerController->crearUsuario($data);
        return redirect()->back()->with('success', 'El usuario ha sido registrado con exito');
    }

    public function mostrarUsuarios()
    {
        $usuarios = User::all();
        return view('admin.USER-editar', compact('usuarios'));
    }

    public function mostrarFormulario($usuario)
    {
        $usuario = User::where('id', '=', $usuario)->first();
        $tipo = 'USER-editar-formulario';
        // *  dd($usuario);
        return view('admin.USER-editar-formulario', compact('usuario', 'tipo'));

    }

    public function actualizarUsuario(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'apellidos' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'regex:/^[6789]\d{8}$/'],
            'fecha_nacimiento' => ['required', 'date'],
            'direccion' => ['required', 'string', 'max:255'],
        ], [
            'name.required' => 'El campo nombre es obligatorio.',
            'name.string' => 'El nombre debe ser una cadena de texto.',
            'name.max' => 'El nombre no debe superar los 255 caracteres.',

            'apellidos.required' => 'El campo apellidos es obligatorio.',
            'apellidos.string' => 'Los apellidos deben ser una cadena de texto.',
            'apellidos.max' => 'Los apellidos no deben superar los 255 caracteres.',


            'telefono.required' => 'El campo teléfono es obligatorio.',
            'telefono.regex' => 'El formato del teléfono no es válido.',

            'fecha_nacimiento.required' => 'La fecha de nacimiento es obligatoria.',
            'fecha_nacimiento.date' => 'La fecha de nacimiento no tiene un formato válido.',

            'direccion.required' => 'El campo dirección es obligatorio.',
            'direccion.string' => 'La dirección debe ser una cadena de texto.',
            'direccion.max' => 'La dirección no debe superar los 255 caracteres.',

        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::where('dni', '=', $request->dni);
        //dd($request->all(), $user);
        $user->update([
            'nombre' => $request->name,
            'apellidos' => $request->apellidos,
            'dni' => $request->dni,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'direccion' => $request->direccion,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'tipo_usuario' => $request->tipo_usuario
        ]);
        return redirect()->back()->with('success', 'Información actualizada correctamente.');

    }
   
}
