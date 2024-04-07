<?php

namespace App\Http\Controllers;

use App\Models\ImagenesSeccion;
use App\Models\Pagina;
use App\Http\Controllers\Controller;
use App\Models\SeccionContenido;
use Illuminate\Http\Request;
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
        return view('inicio', compact('paginas'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pagina $pagina)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pagina $pagina)
    {
        //
    }

    public function mostrarPagina($slug)
    {
        $paginas = Pagina::all();
        $pagina = Pagina::where('slug', '=', $slug)->first();
        $secciones = SeccionContenido::where('idPagina', '=', $pagina->id)->orderBy('orden', 'asc')->get();

        $tipo = $pagina->slug;
        $imagenes = [];
        foreach ($secciones as $seccion) {
            $imagenes['Seccion: ' . $seccion->id . ': ' . $seccion->titulo] = [
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

    public function seleccionarPagina(Request $request) {
        $pagina = $request->paginaElegida;

        return redirect()->route('crearSeccion', ['pagina' => $pagina]);
    }
}
