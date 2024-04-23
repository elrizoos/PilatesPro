@extends('admin/panel-control')

@section('GRUP-editar')
    <div class="combinacion flex">
        <div class="contenedor-formulario">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}

                </div>
            @endif
            <form action="{{ route('grupo.update', ['grupo' => $grupo->id]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="grupo-formulario">
                    <div class="grupo-input">
                        <input class="estilo-formulario" type="text" name="name" id="nombre" placeholder="Nombre"
                            value="{{ $grupo->nombre ?? '' }}">
                        <input type="text" name="apellidos" id="apellidos" class="estilo-formulario"
                            placeholder="Apellidos" value="{{ $grupo->descripcion ?? '' }}">
                    </div>
                    <div class="grupo-error">
                        @error('name')
                            <span class="invalid-feedback active-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        @error('apellidos')
                            <span class="invalid-feedback active-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="grupo-formulario">
                    <input type="submit" value="Enviar">
                </div>
            </form>


        </div>
        <div class="contenedor-tabla flex">
            <h2>Participantes del grupo</h2>
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
                    @foreach ($participantesGrupo as $usuario)
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
                                        <input type="submit" value="Ver/Editar">
                                    </form>
                                    <form
                                        action="{{ route('eliminarParticipante', ['participante' => $usuario->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Eliminar participante">

                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <form action="{{ route('mostrarUsuarios', ['grupo' => $grupo->id]) }}">
                <input type="submit" value="Añadir Participantes">
            </form>
        </div>
    </div>
@endsection
