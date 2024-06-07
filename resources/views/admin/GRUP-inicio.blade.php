@extends('admin/panel-control')

@section('GRUP-inicio')
    <div
        class="container-fluid d-flex flex-column justify-content-center align-items-center h-100 w-100 bg-color-negro rounded-5">
        <table class="table tabla-dorada w-100 fs-5 bg-color-terciario text-center">
            <thead>
                <tr class="text-uppercase">
                    <th class="texto-color-resalte border border-2 border-fondo">ID</th>
                    <th class="texto-color-resalte border border-2 border-fondo">Nombre</th>
                    <th class="texto-color-resalte border border-2 border-fondo">Participantes</th>
                    <th class="texto-color-resalte border border-2 border-fondo">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alumnos as $grupo)
                    <tr class="">
                        <td class="texto-color-resalte border border-2 border-fondo">{{ $grupo['id'] }}</td>
                        <td class="texto-color-resalte border border-2 border-fondo">{{ $grupo['nombreGrupo'] }}</td>
                        <td class="texto-color-resalte border border-2 border-fondo">
                            <ul class="container-fluid row row-cols-3">
                                @foreach ($grupo['participantes'] as $participante)
                                    <li class="col">{{ $participante->nombre }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td class="texto-color-resalte border border-2 border-fondo ">
                            <div class="d-flex justify-content-center align-items-center">
                                <form class="formulario" action="{{ route('grupo.edit', ['grupo' => $grupo['id']]) }}">
                                    <input class="texto-color-resalte estilo-formulario" type="submit" value="Editar">
                                </form>

                                <form class="formulario" action="{{ route('grupo.destroy', ['grupo' => $grupo['id']]) }}">
                                    <input class="texto-color-resalte estilo-formulario" type="submit" value="Eliminar">
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a class="enlace" href="{{ route('grupo.create') }}">Crear nuevo grupo</a>
    </div>
@endsection
