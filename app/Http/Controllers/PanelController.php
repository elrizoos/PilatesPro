<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use App\Models\Grupo;
use App\Models\Horario;
use App\Models\Imagen;
use App\Models\ImagenesSeccion;
use App\Models\Panel;
use App\Models\PaqueteUsuario;
use App\Models\Producto;
use App\Models\Reserva;
use App\Models\Subscription;
use App\Models\User;
use Carbon\Carbon;
use Hash;
use Illuminate\Cache\RedisTagSet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
        $this->orden = '';
        $this->elementoOrden = '';
    }

    public function index()
    {
        $alumnos = User::where('tipo_usuario', '=', 'alumno')->get();
        $profesores = User::where('tipo_usuario', '=', 'profesor')->get();
        $reservas = Reserva::get();
        $tipo = '';
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
            'Enviar boletín mensual',
        ];

        // Obtener configuraciones rápidas
        $configuracionesRapidas = [
            'Configurar Horarios',
            'Cambiar Tarifas',
            'Políticas del Sitio',
        ];

        // Información del sistema
        $infoSistema = [
            'Versión del Software' => '1.0.0',
            'Estado del Servidor' => 'Activo',
        ];

        // Soporte y ayuda
        $soporteAyuda = [
            'Documentación' => '#',
            'Contactar Soporte Técnico' => '#',
        ];

        // Reportes rápidos
        $reportesRapidos = [
            'Generar Reporte de Usuarios' => '#',
            'Generar Reporte de Clases' => '#',
        ];

        // Noticias y actualizaciones
        $noticiasActualizaciones = [
            'Ver Noticias Recientes' => '#',
        ];

        // Seguridad
        $seguridad = [
            'Configurar Seguridad' => '#',
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
        $ruta = 'admin.'.$tipo;
        if(!$this->orden == null){
            $orden = $this->orden;
            $elementoOrden = $this->elementoOrden;
            return view($ruta, compact('tipo', 'datos', 'orden', 'elementoOrden'));
        }
        return view($ruta, compact('tipo', 'datos'));
    }

    public function mostrarContenidoOrdenado($tipo, $orden, $elementoOrden) {
       try {
        //dd(User::all()->sortBy('tipo_usuario'));
        switch($orden){
            case 'ASC':
                $this->datos['usuarios'] = User::all()->sortBy($elementoOrden);
                break;
            case 'DESC':
                $this->datos['usuarios'] = User::all()->sortByDesc($elementoOrden);
        }

        $this->orden = $orden;
        $this->elementoOrden = $elementoOrden;

        //dd($this->datos);
        Log::info('funcionando correctamente');
        return $this->mostrarContenido($tipo);
       } catch(\Exception $e){
        Log::info('Se ha producido un error');
        Log::error('SE HA PRODUCIDO UN ERROR EN FUNCION mostrarContenidoOrdenado' . $e->getMessage());
        return redirect()->back()->with('error', 'Se ha producido un error' . $e->getMessage());
        
       }

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

    public function informesGenerales()
    {
        $asistencias = Asistencia::all();

        $suscripciones = Subscription::all();
        $totalIngresosSuscripcionesActivas = 0;
        foreach ($suscripciones as $producto) {
            $totalIngresosSuscripcionesActivas += $producto->product->precio;
        }

        $paquetesClases = PaqueteUsuario::all();
        $totalIngresosPaquetes = 0;
        foreach ($paquetesClases as $paquete) {
            $totalIngresosPaquetes += $paquete->producto->precio;
        }

        $suscripcionesAgrupadas = Subscription::all()->groupBy('name');
        $suscripcionMaxima = null;
        $maxSucripcion = 0;
        foreach ($suscripcionesAgrupadas as $suscripcion) {
            \Log::info('Maximo al inicio: '.$maxSucripcion);

            if ($suscripcion->count() >= $maxSucripcion) {
                $maxSucripcion = $suscripcion->count();
                $suscripcionMaxima = $suscripcion[0];
                \Log::info('Actualizando maximo '.$maxSucripcion);
                \Log::info('ACTUALIZANDO SUSCRIPCION: '.$suscripcion[0]);
            }
        }
        $nombreSuscripcionFav = $suscripcionMaxima ? $suscripcionMaxima->name : 'N/A';

        $paquetesAgrupados = PaqueteUsuario::all()->groupBy('producto_id');
        $paqueteMaximo = null;
        $maxPaquete = 0;
        \Log::info('Paquetes Agrupados: '.$paquetesAgrupados);

        foreach ($paquetesAgrupados as $paquete) {
            \Log::info('Maximo al inicio: '.$maxPaquete);

            if ($paquete->count() >= $maxPaquete) {
                $maxPaquete = $paquete->count();
                $paqueteMaximo = $paquete[0];
                \Log::info('Actualizando maximo '.$maxPaquete);
                \Log::info('ACTUALIZANDO paquete: '.$paquete[0]);
            }
        }
        $paqueteFav = $paqueteMaximo ? Producto::find($paqueteMaximo->producto_id)->name : 'N/A';

        $tipo = 'INFO-inicio';

        return view('admin.INFO-inicio', compact('asistencias', 'totalIngresosSuscripcionesActivas', 'totalIngresosPaquetes', 'paqueteFav', 'nombreSuscripcionFav', 'tipo'));
    }
}
