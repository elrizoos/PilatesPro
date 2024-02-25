<?php

use App\Http\Controllers\ImagenController;
use App\Http\Controllers\ReservasController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('inicio');
});
Route::get('/acercaDe', function () {
    return view('acercaDe');
})->name('acercaDe');

Route::get('/inicio', function () {
    return view('inicio');
})->name('inicio');

Route::get('/clases', function () {
    return view('clases');
})->name('clases');

Route::get('/horarios', function () {
    return view('horarios');
})->name('horarios');

Route::get('/instructores', function () {
    return view('instructores');
})->name('instructores');

Route::get('/reservas', function () {
    return view('reservas');
})->name('reservas');

Route::get('/preciosVIP', function () {
    return view('preciosVIP');
})->name('preciosVIP');

Route::get('/contacto', function () {
    return view('contacto');
})->name('contacto');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/registro', function () {
    return view('auth.register');
})->name('registro');

Route::get('/configuracion', function () {
    return view('usuario.perfil');
})->name('configuracion-usuario');

Route::get('/usuario/general', function () {
    return view('usuario.general');
})->name('usuario-general');

Route::get('/usuario/general/informacionGeneral', function () {
    return view('usuario.submenu.GEN-infoUsuario');
})->name('general-informacion');

Route::get('/usuario/general/informacionContacto', function () {
    return view('usuario.submenu.GEN-infoContacto');
})->name('general-informacion-contacto');

Route::get('/usuario/general/fotoPerfil', function () {
    return view('usuario.submenu.GEN-fotoPerfil');
})->name('general-fotoPerfil');

Route::get('/usuario/general/preferenciasIdioma', function () {
    return view('usuario.submenu.GEN-preferenciasIdioma');
})->name('general-preferenciasIdioma');

Route::get('/usuario/reservas', function () {
    return view('usuario.reservas');
})->name('usuario-reservas');



Route::get('/usuario/reservas/reservasActivas', function () {
    return view('usuario.submenu.RES-reservasActivas');
})->name('reservas-reservasActivas');

Route::get('/usuario/reservas/sugerenciasReservas', function () {
    return view('usuario.submenu.RES-sugerenciasReservas');
})->name('reservas-sugerenciasReservas');

Route::get('/usuario/suscripcion', function () {
    return view('usuario.suscripcion');
})->name('usuario-suscripcion');

Route::get('/usuario/suscripcion/cambioPlan', function () {
    return view('usuario.submenu.SUS-cambioPlan');
})->name('suscripcion-cambioPlan');

Route::get('/usuario/suscripcion/detallesPlan', function () {
    return view('usuario.submenu.SUS-detallesPlan');
})->name('suscripcion-detallesPlan');

Route::get('/usuario/suscripcion/estadoSuscripcion', function () {
    return view('usuario.submenu.SUS-estadoSuscripcion');
})->name('suscripcion-estadoSuscripcion');

Route::get('/usuario/suscripcion/historialPago', function () {
    return view('usuario.submenu.SUS-historialPago');
})->name('suscripcion-historialPago');



Route::get('/usuario/contrasena', function () {
    return view('usuario.contrasena');
})->name('usuario-contrasena');


Route::get('/usuario/contrasena/cambiarContraseña', function () {
    return view('usuario.submenu.CON-cambiarContraseña');
})->name('contrasena-cambiarContraseña');

Route::get('/usuario/contrasena/opciones', function () {
    return view('usuario.submenu.CON-opciones');
})->name('contrasena-opciones');


Route::get('/usuario/contrasena/politicas', function () {
    return view('usuario.submenu.CON-politicas');
})->name('contrasena-politicas');

Route::get('/usuario/otros', function () {
    return view('usuario.otros');
})->name('usuario-otros');

Route::get('/usuario/otros/notificaciones', function () {
    return view('usuario.submenu.OTR-notificaciones');
})->name('otros-notificaciones');

Route::get('/usuario/otros/privacidad', function () {
    return view('usuario.submenu.OTR-privacidad');
})->name('otros-privacidad');

Route::get('/usuario/otros/redSocial', function () {
    return view('usuario.submenu.OTR-redSocial');
})->name('otros-redSocial');

Route::get('/usuario/otros/eliminar', function () {
    return view('usuario.submenu.OTR-eliminar');
})->name('otros-eliminar');


//Enlaces a controladores

Route::get('/usuario/guardarCambios', [UsuarioController::class, 'guardarCambios'])->name('usuario-guardarCambios');

Route::resource('usuario/imagen', ImagenController::class);

Route::get('/usuario/reservas/historialReservas', [ReservasController::class,'index'])->name('reservas-historialReservas');

Route::resource('usuario/reservas', ReservasController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
