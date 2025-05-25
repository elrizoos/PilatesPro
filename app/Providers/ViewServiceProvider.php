<?php

namespace App\Providers;

use App\Models\Conversacione;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\ConversacionController;

class ViewServiceProvider extends ServiceProvider
{


    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            if(Auth::check()) {
                $conversacionesSinLeer = $this->comprobarConversacionesSinLeer();
                $view->with('conversacionesSinLeer', $conversacionesSinLeer);
            }
        });
    }
    private function comprobarConversacionesSinLeer()
{
    $conversacionesSinLeer = [];
    $totalMensajesSinLeer = 0; // Contador de todos los mensajes sin leer

    $conversacionesUsuario = Conversacione::where('user_one_id', Auth::id())
        ->orWhere('user_two_id', Auth::id())
        ->with('messages.mensajesVistos')
        ->get();

    foreach ($conversacionesUsuario as $conversacion) {
        $contadorMensajes = 0;

        foreach ($conversacion->messages as $message) {
            if ($message->mensajesVistos !== null
                && $message->mensajesVistos->mensajeVisto === 0
                && $message->mensajesVistos->user_id === Auth()->user()->id) {
                
                $contadorMensajes++;
            }
        }

        if ($contadorMensajes > 0) {
            $conversacionesSinLeer[] = [
                'id' => $conversacion->id,
                'sin_leer' => $contadorMensajes
            ];
            $totalMensajesSinLeer += $contadorMensajes; // Sumar al total
        }
    }

    return [
        'conversaciones' => $conversacionesSinLeer,
        'totalMensajes' => $totalMensajesSinLeer,
        'totalConversaciones' => count($conversacionesSinLeer)
    ];
}
}
