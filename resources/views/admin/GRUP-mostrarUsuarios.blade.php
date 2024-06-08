@extends('admin/panel-control')

@section('GRUP-mostrarUsuarios')
    <div class="container-fluid d-flex justify-content-center align-items-center h-100 w-100 rounded-5 flex-column gap-4">
        <h4 class="texto-color-resalte fs-4">Añadir usuarios al grupo {{ $grupo->nombre }} (Grupo_{{ $grupo->id }})</h4>
        <form class="formulario w-100 overflow-y-auto" action="{{ route('añadirParticipantes', ['grupo' => $grupo->id]) }}">
            <table class="table tabla-dorada w-100 fs-5 bg-color-terciario text-center">
                <thead>
                    <tr>
                        <th class="texto-color-titulo border border-2 border-fondo">Nombre</th>
                        <th class="texto-color-titulo border border-2 border-fondo">Apellido</th>
                        <th class="texto-color-titulo border border-2 border-fondo">Tipo Usuario</th>
                        <th class="texto-color-titulo border border-2 border-fondo">Seleccionar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuariosSinGrupo as $usuario)
                        <tr>
                            <td class="texto-color-resalte border border-2 border-fondo">{{ $usuario->nombre }}</td>
                            <td class="texto-color-resalte border border-2 border-fondo">{{ $usuario->apellidos }}</td>
                            <td class="texto-color-resalte border border-2 border-fondo">
                                {{ $usuario->tipo_usuario ?? 'S/A' }}</td>
                            <td class="texto-color-resalte border border-2 border-fondo">
                                <input class="estilo-formulario" type="checkbox" name="añadir[]"
                                    value="{{ $usuario->id }}">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <input class="estilo-formulario estilo-formulario-enviar" type="submit" value="Añadir al grupo">
        </form>
    </div>
@endsection
