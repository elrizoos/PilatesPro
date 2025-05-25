<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MetodosRecuperacione;
use Auth;
use Illuminate\Http\Request;

class MetodosRecuperacioneController extends Controller
{
    public function index()
    {
        return view('password-recovery-options');
    }

    public function store(Request $request)
    {
        $request->validate([
            'method' => 'required|in:email,security_question',
        ]);

        $user = Auth::user();

        $datosRecuperacion = [];

        if ($request->method == 'email') {

            $recoveryMethod = MetodosRecuperacione::updateOrCreate(
                ['user_id' => $user->id],
                ['method' => $request->method],

            );
        } else {
            return redirect()->back()->with('formularioPreguntaRespuesta', true);
        }

        return redirect()->back()->with('status', 'Método de recuperación guardado correctamente.');
    }

    public function guardarInformacionPreRes(Request $request){
        $usuario = Auth::user();

        $metodoUsuario = MetodosRecuperacione::where('user_id', $usuario->id)->first();
        if($metodoUsuario != null){
       try {

            $metodoUsuario->update([
                'user_id' => $usuario->id,
                'method' => 'security_question',
                'pregunta' => $request->preguntas,
                'respuesta' => $request->respuesta,
            ]);
       } catch (\Throwable $th) {
        \Log::error('Error creando informacion pregunta respuesta, Error: ' . $th->getMessage());
        return redirect()->back()->with('error', 'Ha ocurrido un error actualizando el metodo de recuperacion');
       }
    }else {
        $metodoUsuario = MetodosRecuperacione::create([
            'user_id' => $usuario->id,
            'method' => 'security_question',
            'pregunta' => $request->preguntas,
            'respuesta' => $request->respuesta,
        ]);
    }

        return redirect()->back()->with('success', 'Su metodo de recuperacion de contraseña ha sido actualizado a recuperacion mediante ' . $metodoUsuario->method == 'email' ? ' recuperacion por correo electronico' : ' pregunta y respuesta de seguridad');
    }
}
