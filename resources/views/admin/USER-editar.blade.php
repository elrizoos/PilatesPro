@extends('admin/panel-control')

@section('USER-editar')
@php
$ordenNombre = ($elementoOrden == 'nombre' && $orden == 'ASC') ? 'ASC' : 'DESC';
$ordenApellidos = ($elementoOrden == 'apellidos' && $orden == 'ASC') ? 'ASC' : 'DESC';
$ordenTipo = ($elementoOrden == 'tipo_usuario' && $orden == 'ASC') ? 'ASC' : 'DESC';
@endphp
<div class="container-fluid  d-flex justify-content-center align-items-center h-100 w-100 rounded-5 ">
    <table id="tabla-editar-usuarios" class="w-100 fs-5  text-center">
        <thead>
            <tr>

                <th class="fs-5 border border-1 border-fondo"><a id="enlace-ordenacion"
                        href="{{ route('mostrarContenidoOrdenado', ['tipo' => 'USER-editar', 'orden' => $ordenNombre == 'ASC' ? 'DESC' : 'ASC', 'elementoOrden' => 'nombre']) }}"
                        class="d-flex justify-content-center align-items-center">Nombre
                        @if ($elementoOrden === 'nombre')
                        @if ($orden === 'ASC')
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px">
                            <path d="M480-344 240-584l56-56 184 184 184-184 56 56-240 240Z" />
                        </svg>
                        @else
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px">
                            <path d="M480-528 296-344l-56-56 240-240 240 240-56 56-184-184Z" />
                        </svg>
                        @endif
                        @endif
                    </a>
                </th>
                <th class="fs-5 border border-1 border-fondo"><a id="enlace-ordenacion"
                        href="{{ route('mostrarContenidoOrdenado', ['tipo' => 'USER-editar', 'orden' => $ordenApellidos == 'ASC' ? 'DESC' : 'ASC', 'elementoOrden' => 'apellidos']) }}"
                        class="d-flex justify-content-center align-items-center">Apellido
                        @if ($elementoOrden === 'apellidos')
                        @if ($orden === 'ASC')
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px">
                            <path d="M480-344 240-584l56-56 184 184 184-184 56 56-240 240Z" />
                        </svg>
                        @else
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px">
                            <path d="M480-528 296-344l-56-56 240-240 240 240-56 56-184-184Z" />
                        </svg>
                        @endif

                        @endif
                    </a>
                </th>
                <th class="fs-5 border border-1 border-fondo"><a id="enlace-ordenacion"
                        href="{{ route('mostrarContenidoOrdenado', ['tipo' => 'USER-editar', 'orden' => $ordenTipo == 'ASC' ? 'DESC' : 'ASC', 'elementoOrden' => 'tipo_usuario']) }}"
                        class="d-flex justify-content-center align-items-center">Tipo
                        de usuario
                        @if ($elementoOrden === 'tipo_usuario')
                        @if ($orden==='ASC' ) <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                            viewBox="0 -960 960 960" width="24px">
                            <path d="M480-344 240-584l56-56 184 184 184-184 56 56-240 240Z" />
                        </svg>
                        @else
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px">
                            <path d="M480-528 296-344l-56-56 240-240 240 240-56 56-184-184Z" />
                        </svg>
                        @endif

                        @endif
                    </a></th>
                <th class="fs-5 border border-1 border-fondo">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datos['usuarios'] as $usuario)
            <tr>
                <td class=" border border-1 border-fondo">{{ $usuario->nombre }}</td>
                <td class=" border border-1 border-fondo">{{ $usuario->apellidos }}</td>
                <td class=" border border-1 border-fondo">
                    {{ $usuario->tipo_usuario ?? 'S/A' }}</td>
                <td class=" border border-1 border-fondo">
                    <div id="casilla-opciones" class=" d-flex flex-row justify-content-center align-items-center">
                        <form class="formulario"
                            action="{{ route('mostrarFormulario', ['usuario' => $usuario->id, 'tipo' => 'USER-editar-formulario']) }}"
                            method="get">
                            @csrf
                            <input id="input-editar" class=" estilo-formulario" type="submit" value="Editar">
                        </form>
                        <input id="input-eliminar" class=" estilo-formulario" type="button" value="Eliminar"
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
    <form class="formulario" id="form-eliminar-usuario" method="POST">
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