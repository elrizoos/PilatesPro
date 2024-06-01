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
    public function syncProductos() {
        Stripe::setApiKey(config('services.stripe.secret'));
        
        $stripeProductos = Product::all(['limit' => 100]);
        //dd($stripeProductos);
        foreach ($stripeProductos->data as $stripeProducto) {
            $metadata = $stripeProducto->metadata;
            $price = Price::search([
                'query' => 'active:\'true\' AND product:\''. $stripeProducto->id . '\'',
            ]);
            //dd($price->data[0]);
            $type = isset($metadata['type']) ? $metadata['type'] : 'package';

            Producto::updateOrCreate([
                'stripe_id' => $stripeProducto->id],
                [
                    'name' => $stripeProducto->name,
                    'description' => $stripeProducto->description,
                    'type' => $type,
                    'price' => $price->data[0]->unit_amount / 100,
                    'quantity' => isset($metadata['quantity']) ? $metadata['quantity'] : null,
                ]);
        }
        \Log::info('PRODUCTOS CREADOS CON EXITO EL ' . date('now'));
        return response()->json(['message' => 'PRODUCTOS SINCRONIZADOS CON EXITO.']);
    }
}
