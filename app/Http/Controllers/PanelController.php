<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Models\Horario;
use App\Models\Imagen;
use App\Models\ImagenesSeccion;
use App\Models\ImagenSeccion;
use App\Models\ImagenSeccione;
use App\Models\Pagina;
use App\Models\Pago;
use App\Models\Panel;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\RegisterController;
use App\Models\Reserva;
use App\Models\SeccionContenido;
use App\Models\User;
use Carbon\Carbon;
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
        $totalUsuarios = User::count();
        $clasesProgramadas = Horario::where('fecha_especifica', '>=', Carbon::now())->count();

        // Obtener usuarios recientes
        $usuariosRecientes = User::orderBy('created_at', 'desc')->take(5)->get();
        //dd($usuariosRecientes);
        // Obtener clases próximas
        $calendarioClases = Horario::where('fecha_especifica', '>=', Carbon::now())->orderBy('fecha_especifica')->get();

        // Obtener tareas y recordatorios
        $tareasRecordatorios = [
            'Revisar pagos pendientes',
            'Actualizar calendario de clases',
            'Enviar boletín mensual'
        ];

        // Obtener configuraciones rápidas
        $configuracionesRapidas = [
            'Configurar Horarios',
            'Cambiar Tarifas',
            'Políticas del Sitio'
        ];

        // Información del sistema
        $infoSistema = [
            'Versión del Software' => '1.0.0',
            'Estado del Servidor' => 'Activo'
        ];

        // Soporte y ayuda
        $soporteAyuda = [
            'Documentación' => '#',
            'Contactar Soporte Técnico' => '#'
        ];

        // Reportes rápidos
        $reportesRapidos = [
            'Generar Reporte de Usuarios' => '#',
            'Generar Reporte de Clases' => '#'
        ];

        // Noticias y actualizaciones
        $noticiasActualizaciones = [
            'Ver Noticias Recientes' => '#'
        ];

        // Seguridad
        $seguridad = [
            'Configurar Seguridad' => '#'
        ];

        return view('admin.dashboard', compact(
            'alumnos', 'profesores', 'reservas', 'tipo',
            'totalUsuarios',
            'clasesProgramadas',
            'usuariosRecientes',
            'calendarioClases',
            'tareasRecordatorios',
            'configuracionesRapidas',
            'infoSistema',
            'soporteAyuda',
            'reportesRapidos',
            'noticiasActualizaciones',
            'seguridad'
        )
        );
        //depuracion
        //dd('Alumnos: ' . $alumnos);
        //dd('Profesores: ' . $profesores);
        //dd('Reservas: ' . $reservas);

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





    public function mostrarFormulario($usuario)
    {
        $usuario = User::where('id', '=', $usuario)->first();
        $tipo = 'USER-formulario';
        // *  dd($usuario);
        return view('admin.USER-formulario', compact('usuario', 'tipo'));

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

    public function mostrarGaleria()
    {
        //dd('hola');
        $imagenesPerfil = Imagen::all();

        $imagenesSeccion = ImagenesSeccion::all();
        $tipo = 'galeria-inicio';
        return view('admin.galeria.inicio', compact('imagenesPerfil', 'imagenesSeccion', 'tipo'));
    }

    public function mostrarGrupos()
    {
        $grupos = Grupo::all();
        $alumnos = [];
        foreach ($grupos as $grupo) {
            $idGrupo = $grupo->id;

            $alumnosGrupo = User::where('tipo_usuario', '=', 'alumno')->where('grupo_id', '=', $idGrupo)->get();

            $alumnos[] = [
                'nombreGrupo' => $grupo->nombre,
                'id' => $grupo->id,
                'participantes' => $alumnosGrupo,
            ];
        }
        $tipo = 'GRUP-inicio';
        //dd($grupos, $alumnos);

        return view('admin.GRUP-inicio', compact('alumnos', 'tipo'));
    }







}
