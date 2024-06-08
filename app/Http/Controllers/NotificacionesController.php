<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Notificacione;
use App\Models\NotificacionesUsuario;
use App\Models\User;
use App\Notifications\SendNotification;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class NotificacionesController extends Controller
{

    public function index(){
        $usuario = Auth::user();

        $notificacion = NotificacionesUsuario::where('user_id', $usuario->id)->first();

        return view('usuario.submenu.OTR-notificaciones', compact('notificacion'));
    }
    public function asignarNotificacion(Request $request){
        $usuario = Auth::user();
        
        $notificacionUsuario = NotificacionesUsuario::where('user_id', $usuario->id)->first();
        
        if($notificacionUsuario == null){
            $notificacion = NotificacionesUsuario::create([
                'user_id' => $usuario->id,
                'email' => $request->email,
                'sms' => $request->sms,
            ]);
        } else {
            $notificacionUsuario->update([
                'email' => $request->email,
                'sms' => $request->sms,
            ]);
        }

        return redirect()->back()->with('succes', 'Notificaciones guardadas');

    }

    public function mostrarNotificaciones(){
        $notificaciones = Notificacione::all();
        $tipo = 'NOTI-inicio';
        return view('admin.NOTI-inicio', compact('notificaciones', 'tipo'));
        
    }

     public function enviarNotificacion(Request $request)
    {
        $request->validate([
            'tipo' => 'required|in:email',
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:255',
            'mensaje' => 'required|string',
            'importante' => 'required|boolean',
        ]);

        $details = [
            'tipo' => $request->tipo,
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'mensaje' => $request->mensaje,
            'importante' => $request->importante,
        ];

        // Aquí puedes especificar los usuarios a los que se enviarán las notificaciones.
        // Por ejemplo, puedes enviar a todos los usuarios:
        $usuarios = User::all();

        Notification::send($usuarios, new SendNotification($details));
        Notificacione::create($details);
        return redirect()->back()->with('status', 'Notificación enviada correctamente.');
    }
}
