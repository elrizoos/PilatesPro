<?php

namespace App\Http\Controllers;

use App\Models\ImagenesSeccion;
use App\Models\Mensaje;
use App\Models\Pagina;
use App\Models\Producto;
use App\Models\Seccion;
use App\Models\SeccionContenido;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Validator;

class PaginaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paginas = Pagina::all();
        //dd($paginas);
        $suscripciones = Producto::where('type', 'membership')->get();
        if ($suscripciones->isEmpty() || $suscripciones->count() == 0) {
            $suscripciones = false;
            $contadorSuscripciones = 0;
        } else {

            $contadorSuscripciones = count($suscripciones);
        }
        $usuario = Auth::user();
        $mensaje = Mensaje::all();

        //dd($paginas);
        return view('inicio', compact('paginas', 'suscripciones', 'usuario', 'contadorSuscripciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipo = 'CONT-crearPagina';

        return view('admin.CONT-crearPagina', compact('tipo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $titulo = $request->titulo;
        $descripcion = $request->descripcion;

        //dd($titulo, $descripcion);
        $validator = Validator::make($request->all(), [
            'titulo' => ['required', 'string', 'max:255'],
            'descripcion' => ['required', 'string', 'max:255'],
        ], [
            'titulo.required' => 'El campo titulo es obligatorio.',
            'titulo.string' => 'El titulo debe ser una cadena de texto.',
            'titulo.max' => 'El titulo no debe superar los 255 caracteres.',

            'descripcion.required' => 'El campo descripcion es obligatorio.',
            'descripcion.string' => 'Los descripcion deben ser una cadena de texto.',
            'descripcion.max' => 'Los descripcion no deben superar los 255 caracteres.',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $pagina = new Pagina;
        $pagina->titulo = $titulo;
        $pagina->descripcion = $descripcion;
        $pagina->slug = str_replace(' ', '-', $titulo);
        $pagina->save();

        return redirect()->route('crearSeccion', ['pagina' => $pagina->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pagina $pagina)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pagina $pagina)
    {
        Log::debug('Pagina edit', ['pagina' => $pagina]);
        dd($pagina);
        $tipo = 'CONT-crearPagina';

        return view('admin.CONT-crearPagina', compact('pagina', 'tipo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pagina $pagina)
    {
        //dd($pagina);
        $pagina->update([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->back()->with('success', 'La Pagina ha sido actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pagina $pagina)
    {
        $pagina->delete();

        return redirect()->back()->with('success', 'La pagina ha sido borrada con exito');
    }

    public function mostrarPagina($slug)
    {
        $paginas = Pagina::all();
        $pagina = Pagina::where('slug', '=', $slug)->first();

        if (! $pagina) {
            return redirect()->route('home')->with('error', 'Página no encontrada.');
        }

        $secciones = SeccionContenido::where('idPagina', '=', $pagina->id)->orderBy('orden', 'asc')->get();
        $tipo = $pagina->slug;
        $imagenes = [];

        foreach ($secciones as $seccion) {
            $imagenes['Seccion: '.$seccion->id.': '.$seccion->titulo] = [
                'tipo' => Seccion::find($seccion->idSeccion)->tipo,
                'imagenUno' => ImagenesSeccion::find($seccion->idImagenUno),
                'imagenDos' => ImagenesSeccion::find($seccion->idImagenDos) ?? null,
            ];
        }

        return view('pagina.show', [
            'paginas' => $paginas,
            'pagina' => $pagina,
            'secciones' => $secciones,
            'imagenes' => $imagenes,
        ]);
    }

    public function elegirPagina()
    {
        $paginas = Pagina::all();
        $tipo = 'CONT-elegirPagina';

        return view('admin.CONT-elegirPagina', compact('paginas', 'tipo'));
    }

    public function seleccionarPagina(Request $request)
    {
        $pagina = $request->paginaElegida;

        return redirect()->route('crearSeccion', ['pagina' => $pagina]);
    }

    public function eliminarEditarPagina()
    {
        $paginas = Pagina::all();
        $tipo = 'CONT-eliminarEditar';
        $secciones = SeccionContenido::orderBy('idPagina', 'asc')->get();

        return view('admin.CONT-eliminarEditar', compact('paginas', 'tipo', 'secciones'));
    }
}
