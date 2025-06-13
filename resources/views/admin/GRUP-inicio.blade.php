@extends('admin/panel-control')

@section('GRUP-inicio')
<div class="container-fluid d-flex flex-column justify-content-center align-items-center h-100 w-100 ">
    <table class="table w-100 fs-5  text-center">
        <thead>
            <tr class="text-uppercase">
                <th class="fs-5 texto-color-titulo border border-1 border-fondo">ID</th>
                <th class="fs-5 texto-color-titulo border border-1 border-fondo">Nombre</th>
                <th class="fs-5 texto-color-titulo border border-1 border-fondo">Participantes</th>
                <th class="fs-5 texto-color-titulo border border-1 border-fondo">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alumnos as $grupo)
            <tr class="">
                <td class=" border border-1 border-fondo">{{ $grupo['id'] }}</td>
                <td class=" border border-1 border-fondo">{{ $grupo['nombreGrupo'] }}</td>
                <td class=" border border-1 border-fondo">
                    <ul class="fs-5 w-100 text-center">
                        @if($grupo['participantes']->isEmpty())
                        <li class="w-100 text-center">Sin participantes</li>
                        @else
                        <li class="w-100 text-center">
                            {{ $grupo['participantes']->count() }}
                        </li>
                        @endif
                    </ul>
                </td>
                <td class=" border border-1 border-fondo ">
                    <div class="d-flex justify-content-center align-items-center gap-3">
                        <form action="{{ route('grupo.edit', ['grupo' => $grupo['id']]) }}">
                            <input class="texto-color-resalte estilo-formulario p-3" type="submit" value="Editar">
                        </form>

                        <form action="{{ route('grupo.destroy', ['grupo' => $grupo['id']]) }}">
                            <input id="input-eliminar" class="text-white estilo-formulario" type="submit" value="Eliminar">
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a id="input-crear-grupo" href="{{ route('grupo.create') }}">Crear nuevo grupo</a>
</div>
@endsection