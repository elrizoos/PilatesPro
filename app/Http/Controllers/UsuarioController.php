<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Models\RegistroTiempo;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Stripe\Customer;
use Stripe\Stripe;
use Validator;

class UsuarioController extends Controller
{

   public function create(Request $request)
    {
        $data = $request->all();
        $data['password_confirmation'] = $data['password'];

        $registerController = new RegisterController();
        $validator = $registerController->validar($data);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $usuario = $registerController->crearUsuario($data);

        if ($usuario) {
            $registroTiempoController = new RegistroTiemposController();
            $registroTiempoController->create($usuario->id);

            Auth::login($usuario);

            if ($request->producto) {
                return redirect()->route('formularioPago', ['producto' => $request->producto]);
            }

            return redirect()->route('inicio')->with('success', 'Te has registrado con éxito');
        }

        return redirect()->back()->with('error', 'Hubo un problema al registrarse. Por favor, inténtalo de nuevo.');
    }


    public function createConProducto($producto) {
        //dd($producto);
        return view('auth.register', compact('producto'));
    }
    protected function guardarCambios(Request $request)
    {
        $formulario = $request->tipo_informacion;
        //dd($formulario);
        //dd($request->all());

        switch ($formulario) {

            case "informacionGeneral":
                $validator = Validator::make($request->all(), [
                    'nombre' => ['required', 'string', 'max:255'],
                    'apellidos' => ['required', 'string', 'max:255'],
                ]);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $usuario = User::where('email', $request->usuario)->first();
                //dd($usuario);
                if (!$usuario) {
                    return redirect()->back()->withErrors('Usuario no encontrado.')->withInput();
                }
                $data = $request->except(['usuario', 'tipo_informacion']);
                //dd($data);
                try {
                    $usuario->update($data);
                } catch (\Throwable $th) {
                    $th->getMessage();
                }
                return redirect()->back()->with('success', 'Información actualizada correctamente.');
                break;
            case "informacionContacto":
                if ($request->email === $request->usuario) {
                    $validator = Validator::make($request->all(), [
                        'telefono' => ['required', 'regex:/^[6789]\d{8}$/'],

                    ]);
                } else {
                    $validator = Validator::make($request->all(), [
                        'telefono' => ['required', 'regex:/^[6789]\d{8}$/'],
                        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    ]);

                }

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $usuario = User::where('email', $request->usuario)->first();
                //dd($usuario);
                if (!$usuario) {
                    return redirect()->back()->withErrors('Usuario no encontrado.')->withInput();
                }
                $data = $request->except(['usuario', 'tipo_informacion']);
                //dd($data);
                try {
                    $usuario->update($data);
                } catch (\Throwable $th) {
                    $th->getMessage();
                }
                return redirect()->back()->with('success', 'Información actualizada correctamente.');
                break;
        }
    }
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'apellidos' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'regex:/^[6789]\d{8}$/'],
            'fecha_nacimiento' => ['required', 'date'],
            'direccion' => ['required', 'string', 'max:255'],
        ], [
            'name.required' => 'El campo nombre es obligatorio.',
            'name.string' => 'El nombre debe ser una cadena de texto.',
            'name.max' => 'El nombre no debe superar los 255 caracteres.',

            'apellidos.required' => 'El campo apellidos es obligatorio.',
            'apellidos.string' => 'Los apellidos deben ser una cadena de texto.',
            'apellidos.max' => 'Los apellidos no deben superar los 255 caracteres.',


            'telefono.required' => 'El campo teléfono es obligatorio.',
            'telefono.regex' => 'El formato del teléfono no es válido.',

            'fecha_nacimiento.required' => 'La fecha de nacimiento es obligatoria.',
            'fecha_nacimiento.date' => 'La fecha de nacimiento no tiene un formato válido.',

            'direccion.required' => 'El campo dirección es obligatorio.',
            'direccion.string' => 'La dirección debe ser una cadena de texto.',
            'direccion.max' => 'La dirección no debe superar los 255 caracteres.',

        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::where('dni', '=', $request->dni);
        //dd($request->all(), $user);
        $user->update([
            'nombre' => $request->name,
            'apellidos' => $request->apellidos,
            'dni' => $request->dni,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'direccion' => $request->direccion,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'tipo_usuario' => $request->tipo_usuario
        ]);
        return redirect()->back()->with('success', 'Información actualizada correctamente.');

    }
    public function destroy($id)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $usuario = User::find($id);
        $customer = Customer::retrieve($usuario->stripe_id);
        $customer->delete();
        $usuario->delete();
        return redirect()->back()->with('sucess', 'user borrado');
    }
    public function modificarContrasena($usuarioId, Request $request)
    {
        //dd($request->password);
        $validator = Validator::make($request->all(), [
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'password.required' => 'El campo contraseña es obligatorio.',
            'password.string' => 'La contraseña debe ser una cadena de texto.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'La confirmación de la contraseña no coincide.',

        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $usuario = User::find($usuarioId);
        $usuario->update([
            'password' => Hash::make($request->input('password')),
        ]);
        return redirect()->back()->with('success', 'Información actualizada correctamente.');

    }


    public function sumatorioClases(Producto $producto)
    {
        try {
            $usuario = Auth::user();
            \Log::debug('Usuario: ' . json_encode($usuario));
            $tipoProducto = $producto->type;

            switch ($tipoProducto) {
                case 'package':
                    $infoPaquete = $producto->infoPaquete;
                    \Log::debug('Info Paquete: ' . json_encode($infoPaquete));
                    if ($infoPaquete) {
                        $tiempoClase = $infoPaquete->tiempo_clase;
                        switch ($tiempoClase) {
                            case 45:
                                $usuario->registroTiempo->clases_45 += $infoPaquete->numero_clases;
                                break;
                            case 60:
                                $usuario->registroTiempo->clases_60 += $infoPaquete->numero_clases;
                                break;
                            case 120:
                                $usuario->registroTiempo->clases_120 += $infoPaquete->numero_clases;
                                break;
                        }
                        $usuario->registroTiempo->clases_totales += $infoPaquete->numero_clases;
                        $usuario->registroTiempo->minutos_totales += ($infoPaquete->numero_clases * $tiempoClase);
                    } else {
                        throw new \Exception('Información del paquete no encontrada');
                    }
                    break;

                case 'membership':
                    $infoSuscripcion = $producto->infoSuscripcion;
                    \Log::debug('Info Suscripción: ' . json_encode($infoSuscripcion));
                    if ($infoSuscripcion) {
                        $tiempoClase = $infoSuscripcion->tiempo_clase;
                        switch ($tiempoClase) {
                            case 45:
                                $usuario->registroTiempo->clases_45 += $infoSuscripcion->numero_clases;
                                break;
                            case 60:
                                $usuario->registroTiempo->clases_60 += $infoSuscripcion->numero_clases;
                                break;
                            case 120:
                                $usuario->registroTiempo->clases_120 += $infoSuscripcion->numero_clases;
                                break;
                        }
                        $usuario->registroTiempo->clases_totales += $infoSuscripcion->numero_clases;
                        $usuario->registroTiempo->minutos_totales += ($infoSuscripcion->numero_clases * $tiempoClase);
                    } else {
                        throw new \Exception('Información de la suscripción no encontrada');
                    }
                    break;

                default:
                    throw new \Exception('Tipo de producto desconocido');
            }

            $usuario->registroTiempo->save();
            \Log::debug('Usuario actualizado: ' . json_encode($usuario));
            return true;
        } catch (\Throwable $th) {
            \Log::error('Error: ' . $th->getMessage());
            return $th->getMessage();
        }
    }



}
