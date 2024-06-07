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
            return redirect()->back()->with('formularioPreguntaRespuesta');
        }

        return redirect()->back()->with('status', 'Método de recuperación guardado correctamente.');
    }
}
