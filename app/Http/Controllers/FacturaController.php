<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Stripe\Invoice;
use Stripe\Stripe;
use Stripe\Subscription;
use Barryvdh\DomPDF\Facade\PDF;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Factura $factura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Factura $factura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Factura $factura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Factura $factura)
    {
        //
    }

    public function generarFactura($suscripcionId)
    {

        //dd('hola');
        Stripe::setApiKey(config('services.stripe.secret'));

        $usuario = Auth::user();

        try {
            $suscripcion = Subscription::retrieve($suscripcionId);

            // Obtener la última factura de la suscripción
            $ultimaFactura = Invoice::all(['subscription' => $suscripcionId, 'limit' => 1]);

            if (count($ultimaFactura->data) == 0) {
                return redirect()->back()->with('error', 'No se ha encontrado ninguna factura realizada.');
            }

            $factura = $ultimaFactura->data[0];

            $empresa = [
                'nombre' => 'Estudio Pilates',
                'direccion' => 'Mieres, Asturias',
                'telefono' => '667667766',
                'email' => 'estudioPilates@gmail.com',
                'NIF' => '74838374J',
            ];

            $cliente = [
                'nombre' => $usuario->nombre,
                'apellidos' => $usuario->apellidos,
                'telefono' => $usuario->telefono,
                'email' => $usuario->email,
                'DNI' => $usuario->dni,
            ];

            // Usar los timestamps proporcionados por Stripe
            $fecha_emision = date('d/m/Y', $suscripcion->current_period_start);
            $fecha_vencimiento = date('d/m/Y', $suscripcion->current_period_end);

            $factura = [
                'numero' => $factura->number,
                'fecha_emision' => $fecha_emision,
                'fecha_vencimiento' => $fecha_vencimiento,
                'items' => $factura->lines->data,
                'subtotal' => number_format($factura->subtotal / 100, 2),
                'impuestos' => number_format($factura->tax / 100, 2),
                'total' => number_format($factura->total / 100, 2),
                'metodo_pago' => 'Tarjeta de Crédito',
            ];

            $data = compact('empresa', 'cliente', 'factura');

            // Generar el PDF
            $pdf = PDF::loadView('facturaciones.factura', $data);

            // Enviar la factura por email
            /*
            Mail::send('emails.factura', $data, function ($message) use ($usuario, $pdf, $facturaCliente) {
                $message->to($usuario->email, $usuario->nombre)
                    ->subject('Factura de Suscripción')
                    ->attachData($pdf->output(), "factura_{$facturaCliente['numero']}.pdf");
            });
            */
            \Log::debug("Factura generada");
            //dd($pdf);
            return $pdf->stream("factura_{$factura['numero']}.pdf");
        } catch (\Throwable $th) {
            \Log::debug("error en guardar factura: " . $th->getMessage());
            return redirect()->back()->withErrors(['message' => 'Hubo un problema al generar la factura: ' . $th->getMessage()]);
        }
    }

    public function mostrarFactura()
    {
        // Datos de prueba
        $empresa = [
            'nombre' => 'Estudio Pilates',
            'direccion' => 'Mieres, Asturias',
            'telefono' => '667667766',
            'email' => 'estudioPilates@gmail.com',
            'NIF' => '74838374J',
        ];

        $usuario = Auth::user();
        $cliente = [
            'nombre' => $usuario ? $usuario->nombre : 'Nombre del Cliente',
            'apellidos' => $usuario ? $usuario->apellidos : 'Apellidos del Cliente',
            'telefono' => $usuario ? $usuario->telefono : '000000000',
            'email' => $usuario ? $usuario->email : 'cliente@example.com',
            'DNI' => $usuario ? $usuario->dni : '00000000X',
        ];

        $factura = [
            'numero' => '0001',
            'fecha_emision' => date('d/m/Y'),
            'fecha_vencimiento' => date('d/m/Y', strtotime('+30 days')),
            'items' => [
                (object) ['description' => 'Producto 1', 'quantity' => 1, 'amount' => 5000],
                (object) ['description' => 'Producto 2', 'quantity' => 2, 'amount' => 3000],
            ],
            'subtotal' => '11.00',
            'impuestos' => '2.31',
            'total' => '13.31',
            'metodo_pago' => 'Tarjeta de Crédito',
        ];

        $data = compact('empresa', 'cliente', 'factura');

        return view('facturaciones.factura', $data);
    }
}
