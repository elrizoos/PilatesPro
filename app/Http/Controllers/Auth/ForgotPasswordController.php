<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();
        $email = $request->email;
        if ($user) {
            $method = $user->metodosRecuperacion->method ?? 'email';
            // dd($method);
            if ($method === 'email') {
                $response = $this->broker()->sendResetLink(
                    $request->only('email')
                );

                return $response == Password::RESET_LINK_SENT
                    ? back()->with('status', trans($response))
                    : back()->withErrors(['email' => trans($response)]);
            } elseif ($method === 'security_question') {
                // Mostrar formulario de pregunta de seguridad
                // dd('hacia formulario');
                return view('usuario.submenu.CON-formularioPreguntaSeguridad', compact('email'));
            }
        }

        return back()->withErrors(['error' => trans('auth.failed')]);
    }


    protected function broker()
    {
        return Password::broker();
    }

}