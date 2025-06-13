@extends('admin/panel-control')

@section('GRUP-mostrarUsuarios')
    <div class="contenedor-participantes container-fluid d-flex justify-content-center align-items-center h-100 w-100 rounded-5 flex-column gap-4">
        <h4 class="fs-4">Añadir usuarios al grupo {{ $grupo->nombre }} (Grupo_{{ $grupo->id }})</h4>
        <form  id="tabla-participantes" class="formulario w-100 overflow-y-auto" action="{{ route('añadirParticipantes', ['grupo' => $grupo->id]) }}">
            <table class="table w-100 fs-5  text-center">
                <thead>
                    <tr>
                        <th class="fs-5 texto-color-titulo border border-1 border-fondo">Nombre</th>
                        <th class="fs-5 texto-color-titulo border border-1 border-fondo">Apellido</th>
                        <th class="fs-5 texto-color-titulo border border-1 border-fondo">Tipo Usuario</th>
                        <th class="fs-5 texto-color-titulo border border-1 border-fondo">Seleccionar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuariosSinGrupo as $usuario)
                        <tr>
                            <td class=" border border-1 border-fondo">{{ $usuario->nombre }}</td>
                            <td class=" border border-1 border-fondo">{{ $usuario->apellidos }}</td>
                            <td class=" border border-1 border-fondo">
                                {{ $usuario->tipo_usuario ?? 'S/A' }}</td>
                            <td class=" border border-1 border-fondo">
                                <input class="" type="checkbox" name="añadir[]"
                                    value="{{ $usuario->id }}">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <input class="" type="submit" value="Añadir al grupo">
        </form>
    </div>
@endsection
