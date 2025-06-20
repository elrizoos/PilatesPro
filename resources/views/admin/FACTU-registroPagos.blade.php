@extends('admin/panel-control')

@section('FACTU-registroPagos')
    <div class="container-fluid tabla-facturas">
        <div class="filtros-busqueda">
            <form class="d-flex justify-content-center align-items-center p-2 gap-2 texto-color-secundario" id="formularioFiltros" method="get" action="{{ route('registroPagos') }}">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" value="{{ request('nombre') }}">
                <label for="apellidos">Apellidos:</label>
                <input type="text" name="apellidos" id="apellidos" value="{{ request('apellidos') }}">
                <label for="fecha">Fecha Factura:</label>
                <input type="date" name="fecha" id="fecha" value="{{ request('fecha') }}">
                <input type="submit" value="Buscar">

                <a class="bg-light" href="{{ route('registroPagos') }}"><input class="bg-light border border-secondaryç" type="button" value="Reset"></a>

                <input type="hidden" name="orden" id="orden" value="{{ $orden ?? 'ASC' }}">
                <input type="hidden" name="elementoOrden" id="elementoOrden" value="{{ $elementoOrden }}">
            </form>
        </div>

        <table class="table tabla-dorada">
            <thead>
                <tr>
                    <th>
                        <a class="texto-color-dorado" href="#" onclick="ordenarPor('nombre')">Nombre</a>
                        @if ($elementoOrden === 'nombre')
                            {{ $orden === 'ASC' ? '↑' : '↓' }}
                        @endif
                    </th>
                    <th>
                        <a class="texto-color-dorado" href="#" onclick="ordenarPor('apellidos')">Apellidos</a>
                        @if ($elementoOrden === 'apellidos')
                            {{ $orden === 'ASC' ? '↑' : '↓' }}
                        @endif
                    </th>
                    <th>
                        <a class="texto-color-dorado" href="#" onclick="ordenarPor('fecha')">Fecha Factura</a>
                        @if ($elementoOrden === 'fecha')
                            {{ $orden === 'ASC' ? '↑' : '↓' }}
                        @endif
                    </th>
                    <th class="texto-color-dorado">Cantidad Pagada</th>
                    <th class="texto-color-dorado">Factura</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($facturas as $factura)
                    <tr>
                        <td>{{ $factura->alumno->nombre }}</td>
                        <td>{{ $factura->alumno->apellidos }}</td>
                        <td>{{ \Carbon\Carbon::parse($factura->fecha_emision)->format('d/m/Y') }}</td>
                        <td>{{ number_format($factura->monto_total, 2, ',', '.') }}€</td>
                        <td><a class="texto-color-dorado p-1" href="{{ route('descargarFactura', basename($factura->pdf)) }}">Descargar factura</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Paginación --}}
        <div class="mt-3">
            {{ $facturas->links('pagination::bootstrap-4') }}
        </div>
    </div>

    <script>
        function ordenarPor(campo) {
            let actualCampo = document.getElementById('elementoOrden').value;
            let actualOrden = document.getElementById('orden').value;

            document.getElementById('elementoOrden').value = campo;
            document.getElementById('orden').value = (actualCampo === campo && actualOrden === 'ASC') ? 'DESC' : 'ASC';

            document.getElementById('formularioFiltros').submit();
        }
    </script>
@endsection
