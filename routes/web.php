<?php

use App\Http\Controllers\ImagenController;
use App\Http\Controllers\ImagenesSeccionController;
use App\Http\Controllers\PaginaController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\ReservasController;
use App\Http\Controllers\SeccionContenidoController;
use App\Http\Controllers\UsuarioController;
use App\Models\SeccionContenido;
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

Route::get('/', [PaginaController::class, 'index']);
Route::get('/acercaDe', function () {
    return view('acercaDe');
})->name('acercaDe');

Route::get(
    '/inicio',
    [PaginaController::class, 'index']
)->name('inicio');

Route::get('/foro/{pagina}', [PaginaController::class, 'mostrarPagina'])->name('mostrarPagina');
Route::group(['middleware' => 'auth'], function () {


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




    Route::get('/usuario/reservas/historialReservas', [ReservasController::class, 'index'])->name('reservas-historialReservas');
    Route::get('/usuario/reservas/reservasActivas', [ReservasController::class, 'obtenerClasesReservadas'])->name('reservas-reservasActivas');

    Route::get('/admin/panel-control/galeria', [PanelController::class, 'mostrarGaleria'])->name('galeriaImagenes');


    Route::get('/admin/panel-control/mostrarContenido/elegirPagina', [PaginaController::class, 'elegirPagina'])->name('elegirPagina');

    Route::get('/admin/panel-control/mostrarContenido/{tipo}', [PanelController::class, 'mostrarContenido'])->name('mostrarContenido');
    Route::get('/admin/panel-control/inicio', [PanelController::class, 'index'])->name('panel-control');
    Route::get('/admin/panel-control/actualizarUsuario/{usuario}/{tipo}', [PanelController::class, 'mostrarFormulario'])->name('mostrarFormulario');
    Route::get('/admin/panel-control/mostrarFormularioContrasena/{usuario}', [PanelController::class, 'mostrarFormularioContrasena'])->name('mostrarFormularioContrasena');
    Route::put('/admin/panel-control/modificarContrasena/{usuario}', [PanelController::class, 'modificarContrasena'])->name('modificarContrasena');
    Route::get('/admin/panel-control/crearSeccion/{pagina}', [SeccionContenidoController::class, 'create'])->name('crearSeccion');
    Route::get('/admin/panel-control/crearContenido/{opcion}/{pagina}', [SeccionContenidoController::class, 'crearContenido'])->name('crearContenido');
    Route::post('/admin/panel-control/crearContenidoGestionFormulario/{tipoSeccion}/{pagina}', [SeccionContenidoController::class, 'store'])->name('crearContenidoGestionFormulario');
    Route::get('/admin/panel-control/contenido/vistaPrevia/{idContenido}/{pagina}', [SeccionContenidoController::class, 'show'])->name('CONT-vistaPrevia');
    Route::delete('/admin/panel-control/contenido/cancelar/{seccion}', [SeccionContenidoController::class, 'destroy'])->name('cancelarContenido');
    Route::get('/admin/panel-control/contenido/seleccionarPagina', [PaginaController::class, 'seleccionarPagina'])->name('seleccionarPagina');
    Route::get('/admin/panel-control/contenido/seleccionApartado/{pagina}/{seccion}', [SeccionContenidoController::class, 'seleccionApartado'])->name('seleccionApartado');
    Route::post('/admin/panel-control/contenido/seleccionarOrden/{seccion}', [SeccionContenidoController::class, 'seleccionarOrden'])->name('seleccionarOrden');
    Route::get('/admin/panel-control/contenido/eliminarEditarPagina', [PaginaController::class, 'eliminarEditarPagina'])->name('eliminarEditarPagina');
    Route::get('/admin/panel-control/seccion/{seccion}/edit', [SeccionContenidoController::class, 'edit'])->name('seccion.edit');



    Route::resource('usuario/imagen', ImagenController::class);
    Route::resource('usuario/reservas', ReservasController::class);
    Route::resource('/admin/panel-control', PanelController::class);
    Route::resource('/admin/panel-control/usuario', UsuarioController::class);
    Route::resource('/admin/panel-control/seccion', SeccionContenidoController::class);
    Route::resource('/admin/panel-control/pagina', PaginaController::class);
    Route::resource('/admin/panel-control/imagenSeccion', ImagenesSeccionController::class);
});





Auth::routes();

Route::get('/home', function () {
    return redirect('inicio');
})->name('home');
