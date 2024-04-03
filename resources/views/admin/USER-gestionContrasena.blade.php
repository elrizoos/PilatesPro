@extends('admin/panel-control')

@section('USER-gestionContrasena')
    <div class="contenedor-tabla">
        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datos['usuarios'] as $usuario)
                    <tr>
                        <td>{{ $usuario->nombre }}</td>
                        <td>{{ $usuario->apellidos }}</td>
                        <td>
                            <form action="{{ route('mostrarFormularioContrasena', ['usuario' => $usuario->id]) }}">
                                @csrf
                                <input style="color: white" type="submit" value="Cambiar contraseña">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
