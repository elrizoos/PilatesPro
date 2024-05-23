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
    <div>

        <div>
            <div id="imagen-logo" data-url="{{ route('inicio') }}"></div>
        </div>
        <div>
            <div>
                <ul>
                    <li>General</li>
                    <li>Usuarios <span></span>
                        <ul>
                            <li><a href="{{ route('mostrarContenido', 'USER-crear') }}">Crear Usuario Nuevo</a></li>
                            <li><a href="{{ route('mostrarContenido', 'USER-editar') }}">Editar Usuario
                                    Existente</a></li>
                            <li><a href="{{ route('mostrarContenido', 'USER-gestionContrasena') }}">Gestion
                                    Contraseñas</a>
                            </li>
                            <li><a href="{{ route('gestionGrupos') }}">Gestión de grupos</a></li>
                        </ul>
                    </li>
                    <li>Contenido <span></span>
                        <ul>
                            <li><a href="{{ route('mostrarContenido', 'CONT-crearPagina') }}">Crear nueva pagina</a>
                            </li>
                            <li><a href="{{ route('elegirPagina') }}">Crear nueva seccion</a></li>
                            <li><a href="{{ route('eliminarEditarPagina') }}">Eliminar o editar seccion/página</a></li>
                            <li><a href="{{ route('galeriaImagenes') }}">Galeria de imagenes y videos</a></li>
                        </ul>
                    </li>
                    <li>Clases y Horarios <span></span>
                        <ul>
                            <li><a href="{{ route('horario.create') }}">Crear nuevo registro horario</a></li>
                            <li><a href="{{ route('mostrarHorarios') }}">Editar registro horario</a></li>
                            <li><a href="{{ route('clase.create') }}">Crear nueva clase</a></li>
                            <li><a href="{{ route('mostrarClases') }}">Editar clase</a></li>
                        </ul>
                    </li>
                    <li>Pagos y Facturación <span></span>
                        <ul>
                            <li><a href="{{ route('mostrarProductos') }}">Gestionar Productos</a></li>
                            <li>Registrar pagos</li>
                            <li>Generar facturacion</li>
                            <li>Seguimiento de alumnos</li>
                        </ul>
                    </li>
                    <li>Comunicacion y Notificaciones <span></span>
                        <ul>
                            <li>Enviar correo o notificacion</li>
                            <li>Mensajeria interna</li>
                        </ul>
                    </li>
                    <li>Analisis y Reportes <span></span>
                        <ul>
                            <li>Informes generales</li>
                            <li>Encuestas alumnos</li>
                        </ul>
                    </li>
                    <li>Configuracion del sitio <span></span>
                        <ul>
                            <li>Ajustes generales</li>
                            <li>Opciones de seguridad</li>
                            <li>Herramientas externas</li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
        <div>
            @if (session('success'))
                <div>
                    <p>{{ session('success') }}</p>
                    <span id=cerrarBoton></span>
                </div>
            @endif

            @if (session('error'))
                <div>
                    <p>{{ session('error') }}</p>
                    <span id=cerrarBoton></span>
                </div>
            @endif
            @if ($tipo)
                @yield($tipo)
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
