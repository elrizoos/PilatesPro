@extends('admin.panel-control')

@section('content')
    <div class="container-fluid p-3 overflow-y-auto general-dashboard w-100 h-100 rounded-5">
        <div class="row mb-4">
            <div class="col">
                <h1 class="fs-1 text-center text-warning">Panel General</h1>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col">
                <h2 class="fs-3 text-center texto-color-secundario">Visión General</h2>
                <div class="row">
                    <div class="col-md-6  d-flex justify-content-center align-items-center">
                        <div class="card bg-color-fondo-oscuro p-4 border-2 border-dorado text-center">
                            <h3 class="fs-3 texto-color-principal">Usuarios Registrados</h3>
                            <p class="display-4 text-light">{{ $totalUsuarios }}</p>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex justify-content-center align-items-center">
                        <div class="card bg-color-fondo-oscuro p-4 border-2 border-dorado text-center">
                            <h3 class="fs-3 texto-color-principal">Clases Programadas</h3>
                            <p class="display-4 text-light">{{ $clasesProgramadas }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card bg-color-fondo-oscuro p-4">
                    <h2 class="fs-3 text-center text-light">Usuarios Recientes</h2>
                    <ul class="list-group">
                        @foreach ($usuariosRecientes as $usuario)
                            <li class="list-group-item fs-4 d-flex border border-2 border-dorado justify-content-between align-items-center bg-color-fondo-oscuro texto-color-principal">
                                {{ $usuario->nombre }}
                                <a href="{{ route('mostrarFormulario', ['usuario' => $usuario->id, 'tipo' => 'USER-editar-formulario']) }}" class="btn estilo-formulario border border-1 border-dorado-claro texto-color-dorado-claro btn-sm">Ver Perfil</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card p-4 bg-color-fondo-oscuro">
                    <h2 class="fs-3 text-center text-light">Calendario de Clases</h2>
                    <ul class="list-group">
                        @foreach ($calendarioClases as $clase)
                            <li class="list-group-item  texto-color-principal bg-color-fondo-oscuro border border-2 border-dorado fs-4 d-flex justify-content-between">
                                <p>Día: {{ $clase->fecha_especifica }}</p>
                                <p>Horario: {{ $clase->hora_inicio }} a {{ $clase->hora_fin }}</p>
                                 
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card p-4">
                    <h2 class="fs-4 text-center">Notificaciones y Anuncios</h2>
                    <p class="text-center"><a href="#" class="btn btn-info">Enviar Notificación</a></p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card p-4">
                    <h2 class="fs-4 text-center">Tareas y Recordatorios</h2>
                    <ul class="list-group">
                        @foreach ($tareasRecordatorios as $tarea)
                            <li class="list-group-item">{{ $tarea }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card p-4">
                    <h2 class="fs-4 text-center">Configuraciones Rápidas</h2>
                    <ul class="list-group">
                        @foreach ($configuracionesRapidas as $configuracion)
                            <li class="list-group-item"><a href="#">{{ $configuracion }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card p-4">
                    <h2 class="fs-4 text-center">Información del Sistema</h2>
                    @foreach ($infoSistema as $info => $value)
                        <p>{{ $info }}: {{ $value }}</p>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card p-4">
                    <h2 class="fs-4 text-center">Soporte y Ayuda</h2>
                    @foreach ($soporteAyuda as $soporte => $link)
                        <p><a href="{{ $link }}">{{ $soporte }}</a></p>
                    @endforeach
                </div>
            </div>
            <div class="col-md-6">
                <div class="card p-4">
                    <h2 class="fs-4 text-center">Reportes Rápidos</h2>
                    @foreach ($reportesRapidos as $reporte => $link)
                        <p><a href="{{ $link }}">{{ $reporte }}</a></p>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card p-4">
                    <h2 class="fs-4 text-center">Noticias y Actualizaciones</h2>
                    @foreach ($noticiasActualizaciones as $noticia => $link)
                        <p><a href="{{ $link }}">{{ $noticia }}</a></p>
                    @endforeach
                </div>
            </div>
            <div class="col-md-6">
                <div class="card p-4">
                    <h2 class="fs-4 text-center">Seguridad</h2>
                    @foreach ($seguridad as $item => $link)
                        <p><a href="{{ $link }}">{{ $item }}</a></p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
