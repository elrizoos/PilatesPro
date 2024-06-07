@extends('usuario.suscripcion')
@section('historialPago')
    <div>
        <h2>Historial de Pagos</h2>
        @if ($facturasDatos == null)
            <p>No hay pagos registrados.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>ID del Pago</th>
                        <th>Fecha</th>
                        <th>Monto</th>
                        <th>Estado</th>
                        <th>Factura</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($facturasDatos as $factura)
                        <tr>
                            <td>{{ $factura['factura']->id }}</td>
                            <td>{{ \Carbon\Carbon::createFromTimestamp($factura['factura']->created)->toFormattedDateString() }}</td>
                            <td>${{ number_format($factura['factura']->amount / 100, 2) }}</td>
                            <td>{{ $factura['factura']->status }}</td>
                            <td><a href="{{ route('descargarFactura', ['factura' => basename($factura['pdf'])]) }}">Descargar Factura</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
    @vite(['resources/js/contenidoInterno.js'])
@endsection
