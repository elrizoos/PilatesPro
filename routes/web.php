<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
