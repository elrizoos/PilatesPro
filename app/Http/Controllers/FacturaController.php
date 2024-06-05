<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Stripe\Invoice;
use Stripe\InvoiceItem;
use Stripe\PaymentIntent;
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

    public function generarFactura($customerID, $precio, $descripcion, $priceID = null)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $usuario = Auth::user();

        try {
            // Verificar que el precio no sea cero
            if ($precio <= 0) {
                return redirect()->back()->with('error', 'El monto del ítem de la factura debe ser mayor que cero.');
            }
            
            // Crear la factura
            \Log::debug('Creando factura');
            $factura = Invoice::create([
                'customer' => $customerID,
                'auto_advance' => true, // Auto-finaliza la factura
            ]);

            \Log::debug('Factura creada: ' . json_encode($factura));
            \Log::debug('Creando InvoiceItem');

            // Crear un InvoiceItem
            $invoiceItem = InvoiceItem::create([
                'customer' => $customerID,
                'currency' => 'eur',
                'description' => $descripcion,
                'price' => $priceID,
                'invoice' => $factura->id,
            ]);

            \Log::debug('InvoiceItem creado: ' . json_encode($invoiceItem));

            


            // Finalizar la factura
            \Log::debug('Finalizando factura');
            $factura->finalizeInvoice();

            // Obtener la factura con las líneas expandidas
            \Log::debug('Obteniendo factura con líneas expandidas');
            $factura = Invoice::retrieve($factura->id, ['expand' => ['lines']]);

            \Log::debug('Factura obtenida: ' . json_encode($factura));

            if (count($factura->lines->data) == 0) {
                return redirect()->back()->with('error', 'No se ha encontrado ningún ítem en la factura.');
            }

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

            $facturaArray = [
                'numero' => $factura->number,
                'fecha_emision' => now(),
                'fecha_vencimiento' => now()->addMonth(),
                'items' => $factura->lines->data,
                'subtotal' => number_format($factura->subtotal / 100, 2),
                'impuestos' => number_format($factura->tax / 100, 2),
                'total' => number_format($factura->total / 100, 2),
                'metodo_pago' => 'Tarjeta de Crédito',
            ];

            $data = compact('empresa', 'cliente', 'facturaArray');

            // Generar el PDF
            $pdf = PDF::loadView('facturaciones.factura', $data);

            // Guardar el PDF en storage
            $pdfFilePath = 'facturas/' . time() . 'factura_user_' . $usuario->id . '_idFactura_' . $factura->number . '.pdf';
            Storage::put('public/' . $pdfFilePath, $pdf->output());

            // Guardar información de la factura en la base de datos
            $facturaNueva = new Factura();
            $facturaNueva->fecha_emision = now();
            $facturaNueva->monto_total = $facturaArray['total'];
            $facturaNueva->alumno_id = $usuario->id;
            $facturaNueva->pdf = $pdfFilePath;
            $facturaNueva->save();

            \Log::debug("Factura generada correctamente");
            return true;
        } catch (\Throwable $th) {
            \Log::debug("Error en guardar factura: " . $th->getMessage());
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
