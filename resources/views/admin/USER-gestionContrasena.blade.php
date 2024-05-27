@extends('admin/panel-control')

@section('USER-gestionContrasena')
    <div
        class="container-fluid d-flex justify-content-center align-items-center h-100 w-100 bg-color-negro rounded-5">
        <table class="table tabla-dorada w-100 fs-5 bg-color-fondo-muy-oscuro text-center">
            <thead>
                <tr>
                    <th class="text-light border border-2 border-fondo">Nombre</th>
                    <th class="text-light border border-2 border-fondo">Apellidos</th>
                    <th class="text-light border border-2 border-fondo">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datos['usuarios'] as $usuario)
                    <tr>
                        <td class="texto-color-dorado border border-2 border-fondo">{{ $usuario->nombre }}</td>
                        <td class="texto-color-dorado border border-2 border-fondo">{{ $usuario->apellidos }}</td>
                        <td class="texto-color-dorado border border-2 border-fondo">
                            <form action="{{ route('mostrarFormularioContrasena', ['usuario' => $usuario->id]) }}">
                                @csrf
                                <input class="texto-color-dorado-claro estilo-formulario" type="submit"
                                    value="Cambiar contraseña">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
