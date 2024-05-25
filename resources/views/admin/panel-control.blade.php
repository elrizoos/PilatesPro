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

<body class="bg-color-principal">
    <div class="container-fluid vw-100 vh-100">

        <div class="row w-100 h-25">
            <div class="w-100 h-auto img-fluid imagen-logo" id="imagen-logo" data-url="{{ route('inicio') }}"></div>
        </div>
        <div class="row vw-100 h-75">
            <div class="col-3">
                <div class="w-100 h-100 m-auto fs-5 text-nowrap ">
                    <ul class="menu-general">
                        <li class="p-2 texto-color-secundario">General</li>
                        <li class="p-2 texto-color-secundario">Usuarios <span></span>
                            <ul class="submenu fs-6">
                                <li class="p-1"><a href="{{ route('mostrarContenido', 'USER-crear') }}">Crear Usuario Nuevo</a></li>
                                <li class="p-1"><a href="{{ route('mostrarContenido', 'USER-editar') }}">Editar Usuario
                                        Existente</a></li>
                                <li class="p-1"><a href="{{ route('mostrarContenido', 'USER-gestionContrasena') }}">Gestion
                                        Contraseñas</a>
                                </li>
                                <li class="p-1"><a href="{{ route('gestionGrupos') }}">Gestión de grupos</a></li>
                            </ul>
                        </li>
                        <li class="p-2 texto-color-secundario">Contenido <span></span>
                            <ul class="submenu fs-6">
                                <li class="p-1"><a href="{{ route('mostrarContenido', 'CONT-crearPagina') }}">Crear nueva pagina</a>
                                </li>
                                <li class="p-1"><a href="{{ route('elegirPagina') }}">Crear nueva seccion</a></li>
                                <li class="p-1"><a href="{{ route('eliminarEditarPagina') }}">Eliminar o editar seccion/página</a>
                                </li>
                                <li class="p-1"><a href="{{ route('galeriaImagenes') }}">Galeria de imagenes y videos</a></li>
                            </ul>
                        </li>
                        <li class="p-2 texto-color-secundario">Clases y Horarios <span></span>
                            <ul class="submenu fs-6">
                                <li class="p-1"><a href="{{ route('horario.create') }}">Crear nuevo registro horario</a></li>
                                <li class="p-1"><a href="{{ route('mostrarHorarios') }}">Editar registro horario</a></li>
                                <li class="p-1"><a href="{{ route('clase.create') }}">Crear nueva clase</a></li>
                                <li class="p-1"><a href="{{ route('mostrarClases') }}">Editar clase</a></li>
                            </ul>
                        </li>
                        <li class="p-2 texto-color-secundario">Pagos y Facturación <span></span>
                            <ul class="submenu fs-6">
                                <li class="p-1"><a href="{{ route('mostrarProductos') }}">Gestionar Productos</a></li>
                                <li class="p-1">Registrar pagos</li>
                                <li class="p-1">Generar facturacion</li>
                                <li class="p-1">Seguimiento de alumnos</li>
                            </ul>
                        </li>
                        <li class="p-2 texto-color-secundario">Comunicacion y Notificaciones <span></span>
                            <ul class="submenu fs-6">
                                <li class="p-1">Enviar correo o notificacion</li>
                                <li class="p-1">Mensajeria interna</li>
                            </ul>
                        </li>
                        <li class="p-2 texto-color-secundario">Analisis y Reportes <span></span>
                            <ul class="submenu fs-6">
                                <li class="p-1">Informes generales</li>
                                <li class="p-1">Encuestas alumnos</li>
                            </ul>
                        </li>
                        <li class="p-2 texto-color-secundario">Configuracion del sitio <span></span>
                            <ul class="submenu fs-6 p-2">
                                <li class="p-1">Ajustes generales</li>
                                <li class="p-1">Opciones de seguridad</li>
                                <li class="p-1">Herramientas externas</li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="col bg-color-fondo-principal h-100 w-100 p-3">
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
