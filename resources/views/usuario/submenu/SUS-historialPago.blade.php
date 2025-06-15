@extends('usuario.suscripcion')
@section('historialPago')
    <div class="container-fluid d-flex flex-column justify-content-center align-items-center h-100 w-100 rounded-5">
        <h2 class="fs-3 p-4">Historial de Pagos</h2>
        @if ($facturasDatos == null)
            <p>No hay pagos registrados.</p>
            
        @else

            <table class="table tabla-dorada w-100 fs-5 bg-color-terciario text-center">
                <thead>
                    <tr>
                        <th class="fs-5 texto-color-titulo border border-1 border-fondo">ID del Pago</th>
                        <th class="fs-5 texto-color-titulo border border-1 border-fondo">Fecha</th>
                        <th class="fs-5 texto-color-titulo border border-1 border-fondo">Monto</th>
                        <th class="fs-5 texto-color-titulo border border-1 border-fondo">Estado</th>
                        <th class="fs-5 texto-color-titulo border border-1 border-fondo">Factura</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($facturasDatos as $factura)
                        <tr>
                            <td class="texto-color-resalte border border-1 border-fondo">{{ $factura['factura']->id }}</td>
                            <td class="texto-color-resalte border border-1 border-fondo">
                                {{ \Carbon\Carbon::createFromTimestamp($factura['factura']->created)->toFormattedDateString() }}
                            </td>
                            <td class="texto-color-resalte border border-1 border-fondo">
                                ${{ number_format($factura['factura']->amount_paid / 100, 2) }}</td>
                            <td class="texto-color-resalte border border-1 border-fondo">{{ $factura['factura']->status }}
                            </td>
                            <td class="texto-color-resalte border border-1 border-fondo"><a
                                    href="{{ route('descargarFactura', ['factura' => basename($factura['pdf'])]) }}">Descargar
                                    Factura</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
    @vite(['resources/js/contenidoInterno.js'])
@endsection
