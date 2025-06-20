<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Models\PaqueteUsuario;
use App\Models\Subscription as Suscripcion;
use App\Models\User;
use Auth;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Stripe\Invoice;
use Stripe\InvoiceItem;
use Stripe\Stripe;
use Stripe\Subscription;

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

    protected function generarFacturaCompleta($customerID, $total, $descripcion, $fechaEmision, $alumnoId, $importePaquetes, $importeSuscripcion)
    {
        try {
            //dd($customerID, $total, $descripcion, $fechaEmision, $alumnoId, $importePaquetes, (int) $importeSuscripcion);
            Stripe::setApiKey(config('services.stripe.secret'));

            // Obtener el usuario (cliente) desde el ID o Auth
            $usuario = User::find($alumnoId);
            if (! $usuario) {
                $usuario = Auth::user();
            }

            // Crear ítem de factura en Stripe
            \Stripe\InvoiceItem::create([
                'customer' => $customerID,
                'amount' => intval($total * 100), // en céntimos
                'currency' => 'eur',
                'description' => $descripcion,
            ]);

            // Crear factura en Stripe
            $stripeInvoice = \Stripe\Invoice::create([
                'customer' => $customerID,
                'auto_advance' => true,
            ]);
            \Log::debug('Datos factura:', [
                'alumno_id' => $alumnoId,
                'monto_total' => $total,
                'stripe_id' => $stripeInvoice->id,
                'fecha_emision' => $fechaEmision,
            ]);
            // Guardar en base de datos
            $factura = new Factura();
            $factura->alumno_id = $alumnoId;
            $factura->monto_total = $total;
            $factura->stripe_id = $stripeInvoice->id;
            $factura->fecha_emision = $fechaEmision;
            $factura->pdf = '';
            $factura->tipo = 'mensual';
            $factura->save();

            // Datos para el PDF
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
                'numero' => $factura->id,
                'fecha_emision' => \Carbon\Carbon::parse($factura->fecha_emision)->format('d/m/Y'),
                'fecha_vencimiento' => \Carbon\Carbon::parse($factura->fecha_emision)->addMonth()->format('d/m/Y'),
                'items' => [
                    ['concepto' => 'Suscripciones', 'importe' => number_format($importeSuscripcion, 2)],
                    ['concepto' => 'Paquetes', 'importe' => number_format($importePaquetes, 2)],
                ],
                'subtotal' => number_format($total, 2),
                'impuestos' => '0.00',
                'total' => number_format($total, 2),
                'metodo_pago' => 'Tarjeta de Crédito',
            ];

            $data = compact('empresa', 'cliente', 'facturaArray');

            // Generar PDF
            $pdf = PDF::loadView('facturaciones.factura', $data);

            // Guardar PDF
            $nombrePdf = 'factura_user_'.$alumnoId.'_idFactura_'.$factura->id.'.pdf';
            $rutaPdf = 'facturas/'.$nombrePdf;

            Storage::disk('public')->put($rutaPdf, $pdf->output());

            // Guardar ruta en base de datos
            $factura->pdf = $rutaPdf;
            $factura->save();

            return true;
        } catch (\Exception $e) {
            \Log::error("Error al generar factura Stripe o guardar en DB para alumno $alumnoId: ".$e->getMessage());

            return false;
        }
    }

    public function generarFactura($customerID, $precio, $descripcion, $priceID, $tipoProducto, $fecha = null, $usuario = null)
    {
        //dd($fecha);
        Stripe::setApiKey(config('services.stripe.secret'));

        if (! $usuario) {
            $usuario = Auth::user();
        }

        if (! $usuario instanceof \App\Models\User) {
            $usuario = User::find($usuario);
        }

        \Log::debug('Usuario cargado: '.json_encode($usuario));
        try {
            // Verificar que el precio no sea cero
            if ($precio <= 0) {
                \Log::error('El monto es cero');

                return false;
            }
            if ($tipoProducto === 'membership') {
                // Crear una suscripción si el tipo de producto es 'suscripcion'
                $suscripcion = Subscription::all(['customer' => $customerID, 'limit' => 1]);

                // Obtener la última factura de la suscripción
                $facturaID = $suscripcion->data[0]->latest_invoice;
                //dd($facturaID);
                $factura = Invoice::retrieve($facturaID, ['expand' => ['lines']]);
            } else {
                // Crear la factura si el tipo de producto es 'paquete'
                \Log::debug('Creando factura');
                $factura = Invoice::create([
                    'customer' => $customerID,
                    'auto_advance' => true, // Auto-finaliza la factura
                ]);

                \Log::debug('Factura creada: '.json_encode($factura));
                \Log::debug('Creando InvoiceItem');

                // Crear un InvoiceItem
                try {
                    $invoiceItem = InvoiceItem::create([
                        'customer' => $customerID,
                        'currency' => 'eur',
                        'description' => $descripcion,
                        'price' => $priceID,
                        'invoice' => $factura->id,
                    ]);

                    \Log::debug('InvoiceItem creado: '.json_encode($invoiceItem));
                    \Log::debug('InvoiceItem creado: '.json_encode($invoiceItem));
                } catch (\Exception $e) {
                    \Log::error('Error creando InvoiceItem: '.$e->getMessage());

                    return false;
                }

                // Finalizar la factura
                \Log::debug('Finalizando factura');
                $factura->finalizeInvoice();

                // Obtener la factura con las líneas expandidas
                \Log::debug('Obteniendo factura con líneas expandidas');
                $factura = Invoice::retrieve($factura->id, ['expand' => ['lines']]);
            }

            \Log::debug('Factura obtenida: '.json_encode($factura));

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
                'fecha_emision' => $fecha ?? now(),
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
            $pdfFilePath = 'facturas/'.time().'factura_user_'.$usuario->id.'_idFactura_'.$factura->number.'.pdf';
            Storage::disk('public')->put($pdfFilePath, $pdf->output());

            \Log::info('Guardada la factura en storage');
            // Guardar información de la factura en la base de datos
            $facturaNueva = new Factura();
            $facturaNueva->fecha_emision = $fecha ?? now();
            $facturaNueva->monto_total = $facturaArray['total'];
            $facturaNueva->stripe_id = $factura->id;
            $facturaNueva->alumno_id = $usuario->id;
            $facturaNueva->pdf = $pdfFilePath;
            $factura->tipo = 'producto';
            $facturaNueva->save();

            \Log::debug('Factura generada correctamente');

            return true;
        } catch (\Throwable $th) {
            \Log::debug('Error en guardar factura: '.$th->getMessage());

            return redirect()->back()->withErrors(['message' => 'Hubo un problema al generar la factura: '.$th->getMessage()]);
        }
    }

    public function descargarFactura($filename)
    {
        $filePath = 'facturas/'.$filename;

        if (Storage::disk('public')->exists($filePath)) {
            return Storage::disk('public')->download($filePath);
        }

        return redirect()->back()->with('error', 'La factura no se encuentra disponible.');
    }

    public function regenerarFacturas()
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        // Borrar todas las facturas existentes en la base de datos
        Factura::truncate();

        $usuarios = User::all(); // Ajusta esto según tu modelo de usuario
        \Log::info('Número total de usuarios: '.$usuarios->count());

        foreach ($usuarios as $usuario) {
            $customerID = $usuario->stripe_id;

            \Log::info('Procesando usuario '.$usuario->id.' de '.$usuarios->count());

            if ($customerID == null) {
                \Log::alert('No existe usuario de stripe para el usuario con ID: '.$usuario->id);

                continue; // Saltar al siguiente usuario
            }

            \Log::info('Obteniendo facturas cliente para el usuario con ID: '.$usuario->id);

            // Obtener facturas de Stripe para el cliente
            $facturasStripe = Invoice::all(['customer' => $customerID]);

            foreach ($facturasStripe->data as $facturaStripe) {
                $facturaID = $facturaStripe->id;

                // Obtener la factura con las líneas expandidas
                $factura = Invoice::retrieve($facturaID, ['expand' => ['lines']]);

                if (count($factura->lines->data) == 0) {
                    continue; // No procesar facturas sin líneas
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
                    'fecha_emision' => \Carbon\Carbon::createFromTimestamp($factura->created),
                    'fecha_vencimiento' => \Carbon\Carbon::createFromTimestamp($factura->created)->addMonth(),
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
                $pdfFilePath = 'facturas/'.time().'factura_user_'.$usuario->id.'_idFactura_'.$factura->number.'.pdf';
                Storage::put('public/'.$pdfFilePath, $pdf->output());

                // Guardar información de la factura en la base de datos
                Factura::create([
                    'fecha_emision' => \Carbon\Carbon::createFromTimestamp($factura->created),
                    'monto_total' => $facturaArray['total'],
                    'alumno_id' => $usuario->id,
                    'stripe_id' => $facturaID,
                    'pdf' => $pdfFilePath,
                ]);

                \Log::debug('Factura regenerada correctamente para el usuario con ID: '.$usuario->id);
            }
        }

        \Log::info('Proceso completado. Todas las facturas han sido regeneradas.');

        return redirect()->route('panel-control')->with('success', 'Facturas regeneradas correctamente para todos los clientes.');
    }

    public function generarFacturasMasivas(Request $request)
    {
        \Log::debug('Entrando en generarFacturasMasivas');

        try {
            $request->validate([
                'alumnos' => 'required|array',
                'mes' => 'required|integer|min:1|max:12',
                'anio' => 'required|integer|min:2000|max:2100',
            ]);

            // Bloquear facturación del mes en curso o posterior
            if ((int) $request->anio > now()->year || ((int) $request->anio == now()->year && (int) $request->mes >= now()->month)) {
                return redirect()->back()->withErrors(['No se pueden generar facturas del mes actual o posterior.']);
            }

            $alumnos = User::whereIn('id', $request->alumnos)->get();

            \Log::debug('Alumnos a facturar: '.$alumnos->count());

            $errores = [];
            $fechaEmision = \Carbon\Carbon::createFromDate($request->anio, $request->mes, 1);

            foreach ($alumnos as $alumno) {
                if ($alumno->tipo_usuario !== 'Alumno') {
                    $errores[] = "El usuario {$alumno->id} no es alumno";

                    continue;
                }

                $existeFactura = Factura::where('alumno_id', $alumno->id)
                    ->whereMonth('fecha_emision', $request->mes)
                    ->whereYear('fecha_emision', $request->anio)
                    ->exists();

                if ($existeFactura) {
                    $errores[] = "Ya existe una factura para {$alumno->nombre} en {$request->mes}/{$request->anio}.";

                    continue;
                }

                $customerID = $alumno->stripe_id;
                if (! $customerID) {
                    $errores[] = "El alumno {$alumno->nombre} no tiene Customer ID de Stripe.";

                    continue;
                }

                // Calcular total de paquetes
                $productosAlumno = PaqueteUsuario::where('user_id', $alumno->id)
                    ->whereMonth('fecha_compra', $request->mes)
                    ->whereYear('fecha_compra', $request->anio)
                    ->get();
                    $precio_total_productos = 0.00;
                foreach($productosAlumno as $producto){
                    $precio_total_productos += $producto->producto->precio;
                }
                //dd($productosAlumno, $precio_total_productos);
                \Log::info('Productos Encontrados: '.$productosAlumno);
                // Calcular suscripción (si existe)
                $precioSuscripcion = 0.00;
                try {
                    $suscripcionAlumno = Suscripcion::where('user_id', $alumno->id)
                        ->whereMonth('created_at', $request->mes)
                        ->whereYear('created_at', $request->anio)
                        ->first();

                    if ($suscripcionAlumno && $suscripcionAlumno->product) {
                        $precioSuscripcion = $suscripcionAlumno->product->precio;
                    }
                } catch (\Exception $e) {
                    \Log::error("Error al buscar suscripción de {$alumno->id}: ".$e->getMessage());
                    $errores[] = "Error con la suscripción de {$alumno->nombre}.";

                    continue;
                }

                // Si hay algo que facturar
                $total = $precio_total_productos + $precioSuscripcion;
                if ($total <= 0) {
                    $errores[] = "No hay productos ni suscripción para facturar a {$alumno->nombre}.";

                    continue;
                }
                //dd($total);

                // Generar factura completa
                $descripcion = "Factura mes {$request->mes}/{$request->anio} para {$alumno->nombre} {$alumno->apellidos}";
                $resultado = $this->generarFacturaCompleta(
                    $customerID,
                    $total,
                    $descripcion,
                    $fechaEmision,
                    $alumno->id,
                    $precio_total_productos,
                    $precioSuscripcion
                );

                \Log::debug("Resultado generarFactura alumno {$alumno->id}: ".($resultado ? 'true' : 'false'));

                if (! $resultado) {
                    $errores[] = "Error al generar factura para {$alumno->nombre}.";
                }
            }

            if (count($errores) > 0) {
                return redirect()->back()->withErrors($errores);
            }

            return redirect()->back()->with('success', 'Facturas generadas correctamente.');
        } catch (\Exception $e) {
            \Log::error('Error en generarFacturasMasivas: '.$e->getMessage());

            return redirect()->back()->with('error', 'Error inesperado: '.$e->getMessage());
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
