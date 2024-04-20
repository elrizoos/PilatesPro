<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use App\Http\Controllers\Controller;
use Egulias\EmailValidator\Parser\Comment;
use Illuminate\Http\Request;

class ImagenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

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
        try {

            $request->validate([
                'fotoPerfil' => 'required|image|max:2048',
            ]);


            //dd('hola');
            if ($request->hasFile('fotoPerfil') && $request->file('fotoPerfil')->isValid()) {
                $imagen = $request->file('fotoPerfil');

                $hash = md5_file($imagen->getRealPath());

                $existe = Imagen::where('hash', $hash)->exists();

                if (!$existe) {
                    $nombreArchivo = time() . '.' . $request->file('fotoPerfil')->getClientOriginalExtension();
                    //dd('hola');

                    $ruta = $request->file('fotoPerfil')->storeAs('imagenes_perfil', $nombreArchivo, 'public');

                    $imagen = new Imagen;
                    $imagen->usuario_id = auth()->user()->id;
                    $imagen->ruta_imagen = $ruta;
                    $imagen->descripcion = 'Imagen de perfil de ' . auth()->user()->nombre;
                    $imagen->hash = $hash;
                    $imagen->save();

                    return redirect()->back()->with('success', 'foto subida con exito');

                } else {
                    return redirect()->back()->with('error', 'La imagen ya esta en la base de datos');
                }

            }
            //dd('hola');

        } catch (\Throwable $th) {
            //dd('hola');
            return redirect()->back()->with('error', $th->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Imagen $imagen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Imagen $imagen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Imagen $imagen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */


    public function destroy(Imagen $imagen)
    {
        $imagen = Imagen::find($imagen->id);
        $imagen->delete();
        return redirect()->back()->with('success', 'Imagen borrada con exito');
    }
}
