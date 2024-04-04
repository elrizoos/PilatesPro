<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use App\Models\ImagenesSeccion;
use App\Models\ImagenSeccion;
use App\Models\ImagenSeccione;
use App\Models\Panel;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\RegisterController;
use App\Models\Reserva;
use App\Models\SeccionContenido;
use App\Models\User;
use Hash;
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

        return view('admin/panel-control', compact(['alumnos', 'profesores', 'reservas', 'tipo']));
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

    public function mostrarFormularioContrasena($usuarioId)
    {
        $usuario = User::find($usuarioId);
        $tipo = 'USER-gestionContrasena-formulario';
        return view('admin.USER-gestionContrasena-formulario', compact('usuario', 'tipo'));
    }

    public function modificarContrasena($usuarioId, Request $request)
    {
        //dd($request->password);
        $validator = Validator::make($request->all(), [
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'password.required' => 'El campo contraseña es obligatorio.',
            'password.string' => 'La contraseña debe ser una cadena de texto.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'La confirmación de la contraseña no coincide.',

        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $usuario = User::find($usuarioId);
        $usuario->update([
            'password' => Hash::make($request->input('password')),
        ]);
        return redirect()->back()->with('success', 'Información actualizada correctamente.');

    }

    public function crearContenido($opcion)
    {
        switch ($opcion) {
            case 'uno':
                $tipo = 'CONT-opcion-uno';
                return view('formularios-contenido.uno', compact('tipo'));
                break;
            case 'dos':
                break;
            case 'tres':
                break;
            case 'cuatro':
                break;
        }
    }

    public function crearContenidoGestionFormulario(Request $request, $tipoSeccion)
    {
        $validator = Validator::make($request->all(), [
            'titulo' => 'required|string|max:255',
            'foto' => 'required|image|max:2048',
            'parrafo' => 'required|string|max:1000',
        ], [
            'titulo.required' => 'El titulo es requerido',
            'titulo.string' => 'El titulo debe ser un texto',
            'titulo.max' => 'El titulo no puede superar 255 caracteres',

            'foto.required' => 'La foto es obligatoria',
            'foto.max' => 'El tamaño de la foto no puede superar 2mb',

            'parrafo.required' => 'El parrafo es requerido',
            'parrafo.string' => 'El contenido del parrafo es texto',
            'parrafo.max' => 'El parrafo no puede superar los 1000 caracteres',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        //dd('hola');
        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            $nombreArchivo = time() . '.' . $request->file('foto')->getClientOriginalExtension();
            //dd('hola');

            $ruta = $request->file('foto')->storeAs('imagenes_seccion', $nombreArchivo, 'public');

            $imagen = new ImagenesSeccion;
            $imagen->ruta_imagen = $ruta;
            $imagen->descripcion = "Imagen de nueva Seccion";
            $imagen->save();
            $seccion = new SeccionContenido;
            //dd($imagen->id);
            //dd(SeccionContenido::count());
            $seccion->idSeccion = $tipoSeccion;
            $seccion->titulo = $request->titulo;
            $seccion->parrafo = $request->parrafo;
            $seccion->idImagenUno = $imagen->id;
            $seccion->idImagenDos = null;
            $orden = SeccionContenido::orderBy('orden', 'desc')->first()->orden;
            
            if ($orden === null) {
                $orden = 1;
            } else {
                $orden = $orden + 1;
            }
            //dd($orden);
            $seccion->orden = $orden;
            $seccion->save();

            $imagen->idSeccion = $seccion->id;

            return redirect()->route('CONT-vistaPrevia', ['idContenido' => $seccion->id]);
            //Guardar contenido

        }
    }

    public function mostrarVistaPrevia($idSeccion)
    {
        $seccion = SeccionContenido::find($idSeccion);
        $imagen = ImagenesSeccion::find($seccion->idImagenUno);
        $tipo = 'CONT-vistaPrevia';

        //dd($seccion, $imagen, $tipo);
        return view('admin.CONT-vistaPrevia', compact('seccion', 'imagen', 'tipo'));
    }

    public function seleccionApartado()
    {

        $secciones = SeccionContenido::all();
        //dd($secciones);

        $imagenes = [];
        $tipo = 'CONT-seleccionarApartado';
        foreach ($secciones as $seccion) {

            $imagenes[$seccion->titulo] = [
                'imagenUno' => ImagenesSeccion::find($seccion->idImagenUno),
                'imagenDos' => ImagenesSeccion::find($seccion->idImagenDos) ?? null,
            ];
            //dd($imagenes);
        }


        return view('admin.CONT-seleccionarApartado', compact('tipo', 'secciones', 'imagenes'));
    }

    public function cancelarContenido($idSeccion)
    {
        $seccion = SeccionContenido::find($idSeccion);
        $seccion->delete();

        return redirect()->route('admin/panel-control')->with('success', 'La seccion nueva ha sido descartada');
    }

    public function seleccionarOrden(Request $request)
    {
        $partes = explode(' ', $request->orden, 2);

        if (count($partes) === 2) {
            $posicion = $partes[0];
            $tituloSeccion = $partes[1];
            $seccion = SeccionContenido::where('titulo', '=', $tituloSeccion)->first();
            if($seccion->orden === 1) {
                $nuevoOrden = 1;
            } else {
                if ($posicion === 'encima') {
                    $nuevoOrden = $seccion->orden;
                } else {
                    $nuevoOrden = $seccion->orden - 1;
                }
            }

            SeccionContenido::where('orden', '>=', $nuevoOrden)->increment('orden');
            $seccion->orden = $nuevoOrden;
            $seccion->save();
            return redirect()->route('foro');
        }
    }
}
