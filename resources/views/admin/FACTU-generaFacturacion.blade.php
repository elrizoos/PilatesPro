@extends('admin/panel-control')

@section('FACTU-generaFacturacion')
<div class="container mt-4">

    <h2>Generar facturas</h2>

    {{-- Formulario de filtros --}}
    <form method="GET" action="{{ route('generarFacturacion') }}" class="row g-3 mb-4">
        <div class="col-md-2">
            <label for="mes" class="form-label">Mes</label>
            <select name="mes" id="mes" class="form-select">
                @for ($m = 1; $m <= 12; $m++)
                    <option value="{{ $m }}" {{ $mes == $m ? 'selected' : '' }}>
                        {{ \Carbon\Carbon::create()->month($m)->format('F') }}
                    </option>
                @endfor
            </select>
        </div>

        <div class="col-md-2">
            <label for="anio" class="form-label">Año</label>
            <input type="number" name="anio" id="anio" class="form-control" value="{{ $anio }}">
        </div>

        

        <div class="col-md-2 align-self-end">
            <button type="submit" class="btn btn-info bg-color-secundario texto-color-principal">Filtrar</button>
        </div>
    </form>

    

    {{-- Tabla de alumnos sin factura --}}
    @if($alumnos->count())
        <form method="POST" action="{{ route('facturacion.generar') }}">
    @csrf
    <input type="hidden" name="mes" value="{{ $mes }}">
    <input type="hidden" name="anio" value="{{ $anio }}">

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Generar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alumnos as $alumno)
                <tr>
                    <td>{{ $alumno->nombre }}</td>
                    <td>{{ $alumno->apellidos }}</td>
                    <td>
                        <input type="checkbox" name="alumnos[]" value="{{ $alumno->id }}" checked>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <button type="submit" class="btn btn-success mt-3">Generar facturas seleccionadas</button>
</form>
    @else
        <p class="text-muted">Todos los alumnos ya tienen factura para este mes.</p>
    @endif
</div>
@endsection