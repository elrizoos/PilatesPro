<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class GrupoController extends Controller
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
        $tipo = 'GRUP-nuevo';
        $profesores = User::where('tipo_usuario', '=', 'Profesor')->get();
        return view('admin.GRUP-nuevo', compact('tipo', 'profesores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $grupo = new Grupo;

        $grupo->nombre = $request->nombre;
        $grupo->descripcion = $request->descripcion;
        $grupo->profesor_id = $request->profesor;

        $grupo->save();

        //dd($grupo);
        return redirect()->back()->with('success', 'El grupo se ha creado con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Grupo $grupo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grupo $grupo)
    {
        $tipo = 'GRUP-editar';
        $participantesGrupo = User::where('grupo_id', '=', $grupo->id)->get();
        //dd($participantesGrupo);
        return view('admin.GRUP-editar', compact('grupo', 'tipo', 'participantesGrupo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Grupo $grupo)
    {
        //dd($request, $grupo);
        $grupo->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);

        $grupo->save();

        return redirect()->back()->with('success', 'Grupo actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grupo $grupo)
    {
        $grupo->delete();

        return redirect()->back()->with('success', 'El grupo ha sido eliminado de la base de datos con éxito');
    }

    public function añadirParticipantes(Request $request, $idGrupo)
    {
        //dd($idGrupo, $request->input('añadir', []));
        $usuariosAñadir = $request->input('añadir', []);

        foreach ($usuariosAñadir as $usuarioId) {
            $usuario = User::find($usuarioId);
            //dd($usuario, $idGrupo);
            $usuario->update(
                [
                    'grupo_id' => $idGrupo,
                ]
            );

        }
        return redirect()->back()->with('success', 'Participantes añadidos con exito');
    }

    public function mostrarUsuarios($grupo)
    {
        //dd($grupo);
        $grupo = Grupo::find($grupo);
        $usuariosSinGrupo = User::where('grupo_id', '=', null)->where('tipo_usuario', '=', 'alumno')->get();
        //dd($usuariosSinGrupo);
        $tipo = 'GRUP-mostrarUsuarios';
        return view('admin.GRUP-mostrarUsuarios', compact('usuariosSinGrupo', 'grupo', 'tipo'));

    }

    public function eliminarParticipante($participante) {
        $usuario = User::find($participante);
        $usuario->update([
            'grupo_id' => null,
        ]);
        return redirect()->back()->with('success', 'Participante eliminado del grupo');
    }

}
