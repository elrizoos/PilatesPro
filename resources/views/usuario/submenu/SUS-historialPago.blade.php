@extends('usuario.suscripcion')
@section('historialPago')
    <div class="contenedor-historialPago">
        <h2>Historial de Pagos</h2>
        @if ($charges->isEmpty())
            <p>No hay pagos registrados.</p>
        @else
            <table class="table tabla-dorada">
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
                    @foreach ($charges as $charge)
                        <tr>
                            <td>{{ $charge->id }}</td>
                            <td>{{ \Carbon\Carbon::createFromTimestamp($charge->created)->toFormattedDateString() }}</td>
                            <td>${{ number_format($charge->amount / 100, 2) }}</td>
                            <td>{{ $charge->status }}</td>
                            <td><a href="{{ route('generarFactura') }}">Descargar Factura</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
    @vite(['resources/js/contenidoInterno.js'])
@endsection
