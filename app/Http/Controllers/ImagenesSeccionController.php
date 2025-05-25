<?php

namespace App\Http\Controllers;

use App\Models\ImagenesSeccion;
use App\Http\Controllers\Controller;
use App\Models\SeccionContenido;
use Illuminate\Http\Request;

class ImagenesSeccionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(ImagenesSeccion $imagenSeccion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ImagenesSeccion $imagenSeccion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ImagenesSeccion $imagenSeccion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ImagenesSeccion $imagenSeccion)
    {
        $seccion = SeccionContenido::where('idImagenUno', '=', $imagenSeccion->id)->firstOrFail();
        //dd($seccion, $imagenSeccion);
        $imagenSeccion->delete();

        return redirect()->back()->with([
            'success' => 'La foto ha sido eliminada con exito',
            'seccion' => $seccion->id]);
    }
}
