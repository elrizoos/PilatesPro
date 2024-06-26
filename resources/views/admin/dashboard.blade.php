@extends('admin.panel-control')

@section('content')
    <div class="container-fluid p-3 overflow-y-auto general-dashboard w-100 h-100 rounded-5">
        <div class="row mb-4">
            <div class="col">
                <h1 class="fs-1 text-center texto-color-secundario text-uppercase">Panel General</h1>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col">
                <div class="row">
                    <div class="col-md-6  d-flex justify-content-center align-items-center">
                        <div class="card bg-color-fondo-oscuro p-4 border-1 border-dorado text-center">
                            <h3 class="fs-5 texto-color-titulo ">Usuarios Registrados</h3>
                            <p class="display-4 texto-color-resalte">{{ $totalUsuarios }}</p>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex justify-content-center align-items-center">
                        <div class="card bg-color-fondo-oscuro p-4 border-1 border-dorado text-center">
                            <h3 class="fs-5 texto-color-titulo ">Clases Programadas</h3>
                            <p class="display-4 texto-color-resalte">{{ $clasesProgramadas }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card border-dorado bg-color-fondo-oscuro p-4">
                    <h2 class="fs-5 text-center texto-color-resalte mb-3 text-uppercase">Usuarios Recientes</h2>
                    <ul class="fs-5 list-group">
                        @foreach ($usuariosRecientes as $usuario)
                            <li
                                class="list-group-item bg-color-oscuro fs-5 d-flex border border-1 border-dorado-oscuro justify-content-between align-items-center texto-color-titulo">
                                {{ $usuario->nombre }}
                                <a href="{{ route('mostrarFormulario', ['usuario' => $usuario->id, 'tipo' => 'USER-editar-formulario']) }}"
                                    class="btn estilo-formulario border border-1 border-dorado-claro texto-color-resalte btn-sm">Ver
                                    Perfil</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row ">
                    <div class="col mb-4">
                        <div class="card p-4 bg-color-fondo-oscuro border-dorado">
                            <h2 class="fs-5 text-center texto-color-resalte mb-3 text-uppercase">Calendario de Clases</h2>
                            <ul class="fs-5 list-group">
                                @foreach ($calendarioClases as $clase)
                                    <li
                                        class="list-group-item  texto-color-secundario bg-color-oscuro texto-color-titulo border border-1 border-dorado fs-5 d-flex justify-content-between">
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
                        <div class="card bg-color-fondo-oscuro border-dorado w-100 p-4">
                            <h2 class="fs-5 text-cente texto-color-resalte text-uppercase text-center">Notificaciones y
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
