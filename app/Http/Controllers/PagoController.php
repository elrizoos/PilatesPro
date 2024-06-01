<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class PagoController extends Controller
{
    public function index(Producto $producto){
        return view('facturaciones.formulario-pago', compact('producto'));
    }
}
