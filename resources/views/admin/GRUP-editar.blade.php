@extends('admin/panel-control')

@section('GRUP-editar')
    <div>
        <div>

            <form action="{{ route('grupo.update', ['grupo' => $grupo->id]) }}" method="post">
                @csrf
                @method('PUT')
                <div>
                    <div>
                        <input type="text" name="nombre" id="nombre" placeholder="Nombre"
                            value="{{ $grupo->nombre ?? '' }}">
                        <input type="text" name="descripcion" id="descripcion"
                            placeholder="Descripcion" value="{{ $grupo->descripcion ?? '' }}">
                        <select name="profesor" id="profesor-select">
                            @foreach ($profesores as $profesor)
                                <option value="{{ $profesor->id }}">Profesor: {{ $profesor->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        @error('nombre')
                            <span role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        @error('descripcion')
                            <span role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div>
                    <input type="submit" value="Enviar">
                </div>
            </form>


        </div>
        <div>
            <h2>Participantes del grupo</h2>
            <table>
                <thead>
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
                                <div>
                                    <form
                                        action="{{ route('mostrarFormulario', ['usuario' => $usuario->id, 'tipo' => 'USER-editar-formulario']) }}"
                                        method="get">
                                        @csrf
                                        <input type="submit" value="Ver/Editar">
                                    </form>
                                    <form action="{{ route('eliminarParticipante', ['participante' => $usuario->id]) }}"
                                        method="POST">
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
