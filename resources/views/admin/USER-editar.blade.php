@extends('admin/panel-control')

@section('USER-editar')
    <div
        class="container-fluid  d-flex justify-content-center align-items-center h-100 w-100 border border-2 border-warning-subtle rounded  bg-color-negro">
        <table class="table tabla-dorada w-100 fs-5 bg-color-fondo-muy-oscuro text-center">
            <thead>
                <tr>
                    <th class="text-light border border-2 border-fondo">Nombre</th>
                    <th class="text-light border border-2 border-fondo">Apellido</th>
                    <th class="text-light border border-2 border-fondo">Tipo Usuario</th>
                    <th class="text-light border border-2 border-fondo">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datos['usuarios'] as $usuario)
                    <tr>
                        <td class="texto-color-dorado border border-2 border-fondo">{{ $usuario->nombre }}</td>
                        <td class="texto-color-dorado border border-2 border-fondo">{{ $usuario->apellidos }}</td>
                        <td class="texto-color-dorado border border-2 border-fondo">
                            {{ $usuario->tipo_usuario ?? 'S/A' }}</td>
                        <td class="texto-color-dorado border border-2 border-fondo">
                            <div class=" d-flex flex-row justify-content-center align-items-center">
                                <form
                                    action="{{ route('mostrarFormulario', ['usuario' => $usuario->id, 'tipo' => 'USER-editar-formulario']) }}"
                                    method="get">
                                    @csrf
                                    <input class="texto-color-dorado-claro estilo-formulario" type="submit" value="Editar">
                                </form>
                                <input class="texto-color-dorado-claro estilo-formulario" type="button" value="Eliminar"
                                    onclick="eliminarUsuario({{ $usuario->id }})">
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Formulario de eliminación (fuera del bucle foreach) -->
    <div id="formulario-eliminar" style="display: none">
        <form id="form-eliminar-usuario" method="POST">
            @csrf
            @method('DELETE')
            <p>¿Desea eliminar el usuario?</p>
            <div>
                <input id="botonEnviar" type="submit" value="Eliminar">
                <input id="botonCancelar" type="button" value="Cancelar" onclick="cancelarEliminar()">
            </div>
        </form>
    </div>

    <script>
        function eliminarUsuario(id) {
            // Establecer el valor del atributo "action" del formulario con la ruta correcta

            var rutaEliminarUsuario = '{{ route('usuario.destroy', ['usuario' => ':id']) }}';
            rutaEliminarUsuario = rutaEliminarUsuario.replace(':id', id);
            console.log(rutaEliminarUsuario);
            $('#form-eliminar-usuario').attr('action', rutaEliminarUsuario);
            $('#formulario-eliminar').show(); // Mostrar el formulario de eliminación
        }

        function cancelarEliminar() {
            $('#formulario-eliminar').hide(); // Ocultar el formulario de eliminación
        }
    </script>
@endsection
