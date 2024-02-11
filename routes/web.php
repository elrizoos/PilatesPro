<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;

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

Route::get('/login', function() {
    return view('auth.login');
})->name('login');

Route::get('/registro', function() {
    return view('auth.register');
})->name('registro');

Route::get('/configuracion', function() {
    return view('usuario.perfil');
})->name('configuracion-usuario');

Route::get('/usuario/general', function() {
    return view('usuario.general');
})->name('usuario-general');

Route::get('/usuario/general/infoUsuario', function() {
    return view('usuario.submenu.GEN-infoUsuario');
})->name('general-informacion');

Route::get('/usuario/general/infoContacto', function () {
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

Route::get('/usuario/reservas/histoReservas', function () {
    return view('usuario.submenu.RES-histoReservas');
})->name('general-histoReservas');

Route::get('/usuario/reservas/reservasActivas', function () {
    return view('usuario.submenu.RES-reservasActivas');
})->name('general-reservasActivas');

Route::get('/usuario/reservas/sugerenciasReservas', function () {
    return view('usuario.submenu.RES-sugerenciasReservas');
})->name('general-sugerenciasReservas');

Route::get('/usuario/suscripcion', function () {
    return view('usuario.suscripcion');
})->name('usuario-suscripcion');

Route::get('/usuario/suscripcion/cambioPlan', function () {
    return view('usuario.submenu.SUS-cambioPlan');
})->name('general-cambioPlan');

Route::get('/usuario/suscripcion/detallesPlan', function () {
    return view('usuario.submenu.SUS-detallesPlan');
})->name('general-detallesPlan');

Route::get('/usuario/suscripcion/estadoSuscripcion', function () {
    return view('usuario.submenu.SUS-estadoSuscripcion');
})->name('general-estadoSuscripcion');

Route::get('/usuario/suscripcion/historialPago', function () {
    return view('usuario.submenu.SUS-historialPago');
})->name('general-historialPago');



Route::get('/usuario/contrasena', function () {
    return view('usuario.contrasena');
})->name('usuario-contrasena');


Route::get('/usuario/otros/cambiarContraseña', function () {
    return view('usuario.submenu.CON-cambiarContraseña');
})->name('general-cambiarContraseña');

Route::get('/usuario/otros/opciones', function () {
    return view('usuario.submenu.CON-opciones');
})->name('general-opciones');


Route::get('/usuario/otros/politicas', function () {
    return view('usuario.submenu.CON-politicas');
})->name('general-politicas');

Route::get('/usuario/otros', function () {
    return view('usuario.otros');
})->name('usuario-otros');

Route::get('/usuario/otros/notificaciones', function () {
    return view('usuario.submenu.OTR-notificaciones');
})->name('general-notificaciones');

Route::get('/usuario/otros/privacidad', function () {
    return view('usuario.submenu.OTR-privacidad');
})->name('general-privacidad');


Route::get('/usuario/otros/redSocial', function () {
    return view('usuario.submenu.OTR-redSocial');
})->name('general-redSocial');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
