@extends('admin.panel-control')

@section('content')
    <div class="container-fluid p-3 overflow-y-auto general-dashboard w-100 h-100 rounded-5">
        <div class="row mb-4">
            <div class="col">
                <h2 id="titulo-panel" class="fs-1 text-center  text-uppercase">Panel General</h2>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col">
                <div class="row">
                    <div class="col-md-6  d-flex justify-content-center align-items-center">
                        <div class="card p-4 border-1 border-dorado text-center">
                            <h3 class="fs-5  ">Usuarios Registrados</h3>
                            <p class="display-4 ">{{ $totalUsuarios }}</p>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex justify-content-center align-items-center">
                        <div class="card p-4 border-1 border-dorado text-center">
                            <h3 class="fs-5  ">Clases Programadas</h3>
                            <p class="display-4">{{ $clasesProgramadas }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card border-dorado p-4">
                    <h2 class="fs-5 text-center mb-3 text-uppercase">Usuarios Recientes</h2>
                    <ul class="fs-5 list-group">
                        @foreach ($usuariosRecientes as $usuario)
                            <li
                                class="list-group-item  fs-5 d-flex border border-1 border-dorado-oscuro justify-content-between align-items-center">
                                {{ $usuario->nombre }}
                                <a id="botonPerfil" href="{{ route('mostrarFormulario', ['usuario' => $usuario->id, 'tipo' => 'USER-editar-formulario']) }}"
                                    class="btn estilo-formulario border border-1 border-dorado-claro btn-sm">Ver
                                    Perfil</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row ">
                    <div class="col mb-4">
                        <div class="card p-4 border-dorado">
                            <h2 class="fs-5 text-center  mb-3 text-uppercase">Calendario de Clases</h2>
                            <ul class="fs-5 list-group">
                                @foreach ($calendarioClases as $clase)
                                    <li
                                        class="list-group-item  texto-color-secundario  texto-color-titulo border border-1 border-dorado fs-5 d-flex justify-content-between">
                                        <p>Día: {{ $clase->fecha_especifica }}</p>
                                        <p>Horario: {{ $clase->hora_inicio }} a {{ $clase->hora_fin }}</p>

                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card border-dorado w-100 p-4">
                            <h2 class="fs-5 text-cente  text-uppercase text-center">Notificaciones y
                                Anuncios</h2>
                            <p class="text-center p-4"><a href="#"
                                    class="estilo-formulario estilo-formulario-enviar">Enviar Notificación</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    </div>
@endsection
