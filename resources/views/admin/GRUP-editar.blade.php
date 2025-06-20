@extends('admin/panel-control')

@section('GRUP-editar')
<div class="container-fluid w-100 h-100 ">
    <div class="row p-5 h-40 d-flex align-items-center justify-content-center">
        <form class="formulario"
            class="w-100 h-100 container-fluid  fs-5  p-2 d-md-flex flex-column align-items-center justify-content-center"
            action="{{ route('grupo.update', ['grupo' => $grupo->id]) }}" method="post">
            @csrf
            @method('PUT')

            <div id="inputs-grupo" class="row">
                <div class="form-group">
                    <label for="nombre">Nombre de grupo:</label>
                    <input class="" type="text" name="nombre" id="nombre" value="{{ $grupo->nombre ?? '' }}">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripcion:</label>
                    <input type="text" name="descripcion" id="descripcion" value="{{ $grupo->descripcion ?? '' }}">
                </div>
            </div>
            <!--
                
                    <div class="row d-flex justify-content-center align-items-center">
                    <div class="col d-flex flex-column justify-content-center align-items-center">
                        <input class="p-1 estilo-formulario w-100 text-center" type="text" name="nombre" id="nombre"
                            placeholder="Nombre" value="{{ $grupo->nombre ?? '' }}">
                        <hr class="mt-0 w-100 linea-transition-weigth border border-warning-subtle  border-1 ">

                        @error('nombre')
                            <span role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col d-flex flex-column justify-content-center align-items-center">
                        <input class="p-1 estilo-formulario w-100 text-center" type="text" name="descripcion"
                            id="descripcion" placeholder="Descripcion" value="{{ $grupo->descripcion ?? '' }}">
                        <hr class="mt-0 w-100 linea-transition-weigth border border-warning-subtle  border-1 ">

                        @error('descripcion')
                            <span role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col d-flex flex-column justify-content-center align-items-center">
                        <div class="row">
                            <select class="estilo-formulario-select" name="profesor" id="profesor-select">
                                @foreach ($profesores as $profesor)
                                    <option value="{{ $profesor->id }}">Profesor: {{ $profesor->nombre }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                </div>
                
                -->
            <div class="row">
                <div class="col d-flex flex-column justify-content-center align-items-center">
                    <div>
                        <input class="estilo-formulario estilo-formulario-enviar" type="submit"
                            value="Actualizar datos">
                    </div>
                </div>

            </div>


        </form>
    </div>
    <div class="row max-heigth-60 texto-color-resalte d-flex flex-column justify-content-center align-items-center">
        <div class="col mh-100">
            <div class="row">
                <div class="col p-3">
                    <h2 class="text-center fs-3 text-uppercase">Participantes del grupo</h2>
                </div>

            </div>
            <div class="row h-75 overflow-y-auto  max-heigth-10em">
                <div class="col h-100 ">
                    <table class="table w-100 fs-5  text-center">
                        <thead class="">
                            <tr class="text-uppercase sticky-top  border border-1 border-fondo">
                                <th class="fs-5 texto-color-titulo border border-1 border-fondo">Nombre</th>
                                <th class="fs-5 texto-color-titulo border border-1 border-fondo">Apellido</th>
                                <th class="fs-5 texto-color-titulo border border-1 border-fondo">Tipo Usuario</th>
                                <th class="fs-5 texto-color-titulo border border-1 border-fondo">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($participantesGrupo as $usuario)
                            <tr>
                                <td class=" border border-1 border-fondo">{{ $usuario->nombre }}
                                </td>
                                <td class=" border border-1 border-fondo">
                                    {{ $usuario->apellidos }}</td>
                                <td class=" border border-1 border-fondo">
                                    {{ $usuario->tipo_usuario ?? 'S/A' }}</td>
                                <td class=" border border-1 border-fondo">
                                    <div class="d-flex justify-content-center align-items-center gap-3">
                                        <form class=""
                                            action="{{ route('mostrarFormulario', ['usuario' => $usuario->id, 'tipo' => 'USER-editar-formulario']) }}"
                                            method="get">
                                            @csrf
                                            <input class="texto-color-resalte estilo-formulario" type="submit"
                                                value="Ver/Editar">
                                        </form>
                                        <form class=""
                                            action="{{ route('eliminarParticipante', ['participante' => $usuario->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input class="texto-color-resalte estilo-formulario" type="submit"
                                                value="Eliminar participante">

                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col d-flex justify-content-center align-items-center">
                    <form class="formulario" action="{{ route('mostrarUsuarios', ['grupo' => $grupo->id]) }}">
                        <input class="texto-color-resalte estilo-formulario fs-4" type="submit"
                            value="Añadir Participantes">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection