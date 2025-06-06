<?php

namespace App\Http\Controllers;

use App\Models\Clase;
use App\Models\Grupo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClaseController extends Controller
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
        $tipo = 'CLASE-nueva';
        $grupos = Grupo::all();

        return view('admin.CLASE-nueva', compact('tipo', 'grupos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        try {
            $validator = Validator::make($request->all(), [
                'nombre' => ['required', 'string', 'max:50'],
                'grupo' => ['required'],
            ], [
                'nombre.required' => 'El campo nombre es obligatorio.',
                'nombre.string' => 'El nombre debe ser una cadena de texto.',
                'nombre.max' => 'El nombre no debe superar los 255 caracteres.',

                'grupo.required' => 'El campo nombre es obligatorio.',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
        } catch (\Throwable $th) {
            \Log::error('Error Validación: '.$th->getMessage());

            return redirect()->back()->with('error', 'Hubo un problema con la validación de los datos.');
        }
        $clase = new Clase;
        $clase->nombre = $request->nombre;
        $clase->grupo_id = $request->grupo;

        $clase->save();

        return redirect()->back()->with('success', 'La clase se ha añadido correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Clase $clase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Clase $clase)
    {
        $tipo = 'CLASE-editar';

        $grupos = Grupo::all();

        return view('admin.CLASE-editar', compact('tipo', 'grupos', 'clase'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $clase)
    {
        $clase = Clase::find($clase);
        $clase->update([
            'nombre' => $request->nombre,
            'grupo_id' => $request->grupo,
        ]);

        return redirect()->back()->with('success', 'La clase se ha actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Clase $clase)
    {
        //
    }

    public function mostrarClases()
    {
        $clases = Clase::all();

        $tipo = 'CLASE-inicio';

        return view('admin.CLASE-inicio', compact('clases', 'tipo'));
    }
}
