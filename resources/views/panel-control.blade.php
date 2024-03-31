<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div class="panel-contenedor">

        <div class="panel-logo">
            <div class="logo"></div>
        </div>
        <div class="panel-nav">
            <div class="nav-menu">
                <ul class="menu-general">
                    <li>General</li>
                    <li class="usuarios">Usuarios <span></span>
                        <ul class="submenu">
                            <li><a href="{{ route('contenido', 'USER-crear') }}">Crear Usuario Nuevo</a></li>
                            <li><a href="{{ route('contenido', 'USER-editar') }}">Editar Usuario
                                    Existente</a></li>
                            <li><a href="{{ route('contenido', 'USER-gestionContrasena') }}">Gestion Contraseñas</a>
                            </li>
                        </ul>
                    </li>
                    <li class="contenido">Contenido <span></span>
                        <ul class="submenu">
                            <li><a href="{{ route('contenido', 'CONT-crear') }}">Crear nueva pagina</a></li>
                            <li>Crear nueva sección</li>
                            <li>Eliminar seccion o página</li>
                            <li>Galeria de imagenes y videos</li>
                        </ul>
                    </li>
                    <li class="clases-horarios">Clases y Horarios <span></span>
                        <ul class="submenu">
                            <li>Crear nuevo registro horario</li>
                            <li>Editar registro horario</li>
                            <li>Crear nueva clase</li>
                            <li>Editar clase</li>
                            <li>Eliminar registro horario</li>
                            <li>Eliminar clase</li>
                        </ul>
                    </li>
                    <li class="pagos-facturacion">Pagos y Facturación <span></span>
                        <ul class="submenu">
                            <li>Registrar pagos</li>
                            <li>Generar facturacion</li>
                            <li>Seguimiento de alumnos</li>
                        </ul class="submenu">
                    </li>
                    <li class="comunicacion-notificaciones">Comunicacion y Notificaciones <span></span>
                        <ul class="submenu">
                            <li>Enviar correo o notificacion</li>
                            <li>Mensajeria interna</li>
                        </ul>
                    </li>
                    <li class="analisis-reportes">Analisis y Reportes <span></span>
                        <ul class="submenu">
                            <li>Informes generales</li>
                            <li>Encuestas alumnos</li>
                        </ul>
                    </li>
                    <li class="configuracion">Configuracion del sitio <span></span>
                        <ul class="submenu">
                            <li>Ajustes generales</li>
                            <li>Opciones de seguridad</li>
                            <li>Herramientas externas</li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
        <div class="panel-contenido">
            @if ($tipo)
                @switch($tipo)
                    @case('USER-crear')
                        @yield('USER-crear')
                    @break

                    @case('USER-editar')
                        @yield('USER-editar')
                    @break

                    @case('USER-editar-formulario')
                        @yield('USER-editar-formulario')
                    @break

                    @case('USER-gestionContrasena')
                        @yield('USER-gestionContrasena')
                    @break

                    @case('USER-gestionContrasena-formulario')
                        @yield('USER-gestionContrasena-formulario')
                    @break

                    @case('CONT-crear')
                        @yield('CONT-crear')
                    @break

                    @case('CONT-opcion-uno')
                        @yield('CONT-opcion-uno')
                    @break

                    @case('CONT-opcion-dos')
                        @yield('CONT-crear')
                    @break

                    @case('CONT-opcion-tres')
                        @yield('CONT-crear')
                    @break

                    @default
                @endswitch
            @else
            @endif
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.submenu').hide();
            $('.menu-general li').click(function() {
                console.log("hola cargando funcion")
                $('.submenu').hide();

                console.log($(this).find('.submenu').show());
            });
        });
    </script>
</body>

</html>
