<?php

namespace App\Http\Controllers;

use App\Models\ImagenesSeccion;
use App\Models\SeccionContenido;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SeccionContenidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $secciones = SeccionContenido::all();
        $tipo = 'foro';
        $imagenes = [];
        $tipo = 'CONT-seleccionarApartado';
        foreach ($secciones as $seccion) {

            $imagenes[$seccion->titulo] = [
                'imagenUno' => ImagenesSeccion::find($seccion->idImagenUno),
                'imagenDos' => ImagenesSeccion::find($seccion->idImagenDos) ?? null,
            ];
            //dd($imagenes);
        }
        return view('foro', compact('secciones', 'tipo', 'imagenes'));
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
    public function show(SeccionContenido $seccionContenido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SeccionContenido $seccionContenido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SeccionContenido $seccionContenido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SeccionContenido $seccionContenido)
    {
        $seccion = SeccionContenido::find($seccionContenido);
        $seccion->delete();

        return redirect()->route('admin/panel-control')->with('success', 'La seccion nueva ha sido descartada');
    }
}
