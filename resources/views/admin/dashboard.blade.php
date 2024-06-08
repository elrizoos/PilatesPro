@extends('admin.panel-control')

@section('content')
    <div class="container-fluid p-3 overflow-y-auto general-dashboard w-100 h-100 rounded-5">
        <div class="row mb-4">
            <div class="col">
                <h1 class="fs-1 text-center texto-color-titulo text-uppercase">Panel General</h1>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col">
                <div class="row">
                    <div class="col-md-6  d-flex justify-content-center align-items-center">
                        <div class="card bg-color-fondo p-4 border-2 border-dorado text-center">
                            <h3 class="fs-5 texto-color-secundario ">Usuarios Registrados</h3>
                            <p class="display-4 texto-color-resalte">{{ $totalUsuarios }}</p>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex justify-content-center align-items-center">
                        <div class="card bg-color-fondo p-4 border-2 border-dorado text-center">
                            <h3 class="fs-5 texto-color-secundario ">Clases Programadas</h3>
                            <p class="display-4 texto-color-resalte">{{ $clasesProgramadas }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card bg-color-fondo p-4">
                    <h2 class="fs-5 text-center texto-color-resalte mb-3 text-uppercase">Usuarios Recientes</h2>
                    <ul class="list-group">
                        @foreach ($usuariosRecientes as $usuario)
                            <li
                                class="list-group-item fs-5 d-flex border border-2 border-dorado justify-content-between align-items-center bg-color-fondo texto-color-secundario">
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
                <div class="row">
                    <div class="col">
                        <div class="card p-4 bg-color-fondo">
                            <h2 class="fs-5 text-center texto-color-resalte mb-3 text-uppercase">Calendario de Clases</h2>
                            <ul class="list-group">
                                @foreach ($calendarioClases as $clase)
                                    <li
                                        class="list-group-item  texto-color-secundario bg-color-fondo border border-2 border-dorado fs-5 d-flex justify-content-between">
                                        <p>Día: {{ $clase->fecha_especifica }}</p>
                                        <p>Horario: {{ $clase->hora_inicio }} a {{ $clase->hora_fin }}</p>

                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card p-4">
                            <h2 class="fs-5 text-center">Notificaciones y Anuncios</h2>
                            <p class="text-center"><a href="#" class="btn btn-info">Enviar Notificación</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    </div>
@endsection
