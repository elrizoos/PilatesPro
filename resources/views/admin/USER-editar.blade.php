@extends('admin/panel-control')

@section('USER-editar')
    <div class="contenedor-tabla">
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
                @foreach ($datos['usuarios'] as $usuario)
                    <tr>
                        <td>{{ $usuario->nombre }}</td>
                        <td>{{ $usuario->apellidos }}</td>
                        <td>{{ $usuario->tipo_usuario ?? 'S/A' }}</td>
                        <td>
                            <div class="opciones">
                                <form
                                    action="{{ route('mostrarFormulario', ['usuario' => $usuario->id, 'tipo' => 'USER-editar-formulario']) }}"
                                    method="get">
                                    @csrf
                                    <input type="submit" value="Editar">
                                </form>
                                <input type="button" value="Eliminar" onclick="eliminarUsuario({{ $usuario->id }})">
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Formulario de eliminación (fuera del bucle foreach) -->
    <div class="formulario-eliminar" id="formulario-eliminar" style="display: none">
        <form id="form-eliminar-usuario" method="POST">
            @csrf
            @method('DELETE')
            <p>¿Desea eliminar el usuario?</p>
            <div class="botones">
                <input id="botonEnviar" type="submit" value="Eliminar">
                <input id="botonCancelar" type="button" value="Cancelar" onclick="cancelarEliminar()">
            </div>
        </form>
    </div>

    <script>
        function eliminarUsuario(id) {
            // Establecer el valor del atributo "action" del formulario con la ruta correcta

            var rutaEliminarUsuario = '{{ route('eliminarUsuario', ['usuario' => ':id']) }}';
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
