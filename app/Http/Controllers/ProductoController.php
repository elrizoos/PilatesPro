<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ClasePaquete;
use App\Models\Membresia;
use Illuminate\Http\Request;
use Stripe\Product;
use Stripe\Stripe;

class ProductoController extends Controller
{
    public function index() {
        $datos = [];

        Stripe::setApiKey(config('services.stripe.secret'));
        $datos = [];
        $paquetes = ClasePaquete::all();
        foreach ($paquetes as $paquete) {
            $producto = Product::retrieve($paquete->producto_id);

            $datos[] = [
                'paquete' => $paquete,
                'producto' => $producto,
            ];
        }

        $membresias = Membresia::all();
        dd($membresias, $datos);
        $tipo = 'FACTU-productos';
        return view('admin.FACTU-productos', compact('datos', 'membresias', 'tipo'));
        
    }
}
