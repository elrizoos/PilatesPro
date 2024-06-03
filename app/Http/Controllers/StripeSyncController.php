<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;
use Stripe\Price;
use Stripe\Product;
use Stripe\Stripe;

class StripeSyncController extends Controller
{
    public function syncProductos()
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        // Obtener productos de Stripe
        $stripeProductos = Product::all(['limit' => 100, 'active' => 'true'])->data;
        //dd($stripeProductos);
        if($stripeProductos == null){
            return response()->json(['message' => 'PRODUCTOS SINCRONIZADOS CON EXITO. NO HAY PRODUCTOS ACTIVOS EN STRIPE']);

        }
        // Obtener todos los IDs de los productos de Stripe
        $stripeProductoIds = array_map(function ($product) {
            return $product->id;
        }, $stripeProductos);

        // Obtener los productos de la base de datos que ya no están en Stripe y eliminarlos
        Producto::whereNotIn('stripe_id', $stripeProductoIds)->delete();

        foreach ($stripeProductos as $stripeProducto) {
            $metadata = $stripeProducto->metadata;
            $prices = Price::all(['product' => $stripeProducto->id, 'active' => true])->data;

            // Verificar si hay precios activos
            if (!empty($prices)) {
                $price = $prices[0];
                $type = isset($metadata['type']) ? $metadata['type'] : 'package';

                // Actualizar o crear producto en la base de datos
                Producto::updateOrCreate(
                    ['stripe_id' => $stripeProducto->id],
                    [
                        'name' => $stripeProducto->name,
                        'description' => $stripeProducto->description,
                        'type' => $type,
                        'precio' => $price->unit_amount / 100,
                        'precio_stripe_id' => $price->id,
                    ]
                );
            }
        }

        \Log::info('PRODUCTOS SINCRONIZADOS CON EXITO EL ' . now());
        return response()->json(['message' => 'PRODUCTOS SINCRONIZADOS CON EXITO.']);
    }

}
