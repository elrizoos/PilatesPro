@extends('admin/panel-control')

@section('USER-gestionContrasena')
<div class="container-fluid d-flex justify-content-center align-items-center h-100 w-100">
    <table class="table tabla-dorada w-100 fs-5 text-center">
        <thead>
            <tr>
                <th class="fs-5 texto-color-titulo border border-1 border-fondo">Nombre</th>
                <th class="fs-5 texto-color-titulo border border-1 border-fondo">Apellidos</th>
                <th class="fs-5 texto-color-titulo border border-1 border-fondo">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datos['usuarios'] as $usuario)
            <tr>
                <td class="texto-color-resalte border border-1 border-fondo">{{ $usuario->nombre }}</td>
                <td class="texto-color-resalte border border-1 border-fondo">{{ $usuario->apellidos }}</td>
                <td class="texto-color-resalte border border-1 border-fondo d-flex justify-content-center align-items-center">
                    <form class="formulario"
                        action="{{ route('mostrarFormularioContrasena', ['usuario' => $usuario->id]) }}">
                        @csrf
                        <input class="texto-color-resalte estilo-formulario" type="submit" value="Cambiar contraseña">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection