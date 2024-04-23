@extends('admin/panel-control')

@section('GRUP-mostrarUsuarios')
    <div class="contenedor-tabla flex">
        <h4>Añadir usuarios al grupo {{ $grupo->nombre }} (Grupo_{{ $grupo->id}})</h4>
        <form action="{{ route('añadirParticipantes', ['grupo' => $grupo->id]) }}">
            <table class="table table-light">
                <thead class="thead-light">
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Tipo Usuario</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuariosSinGrupo as $usuario)
                        <tr>
                            <td>{{ $usuario->nombre }}</td>
                            <td>{{ $usuario->apellidos }}</td>
                            <td>{{ $usuario->tipo_usuario ?? 'S/A' }}</td>
                            <td>
                                <input type="checkbox" name="añadir[]" value="{{ $usuario->id }}">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <input type="submit" value="Añadir al grupo">
        </form>
    </div>
@endsection
