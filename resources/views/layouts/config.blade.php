<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="container-fluid w-100 vh-100">
    <div class="row h-25">
        <div class="col  w-100 h-100 p-4">
            <div class="img-fluid imagen-logo w-100 h-100 img" id="imagen-logo" data-url="{{ route('inicio') }}">
            </div>
        </div>
    </div>
    <div class="row h-75" id="app">
        <div class="col h-100">
            @if (session('success'))
                <div role="alert">
                    {{ session('success') }}

                </div>
            @endif
            @if (session('error'))
                <div role="alert">
                    {{ session('error') }}

                </div>
            @endif
            <div class="row colorRojo p-2">
                <ul class="nav gap-4 w-100 h-100">
                    <li id="contenidoGeneral" data-url="{{ route('general-informacion') }}">
                        General
                    </li>
                    <li id="contenidoReservas" data-url="{{ route('reservas-historialReservas') }}">Reservas
                    </li>
                    <li id="contenidoSuscripcion" data-url="{{ route('suscripcion-estadoSuscripcion') }}">
                        Suscripcion</li>
                    <li id="contenidoContraseña" data-url="{{ route('contrasena-cambiarContraseña') }}">
                        Cambiar contraseña</li>
                    <li id="contenidoOtros" data-url="{{ route('otros-notificaciones') }}">Otros
                        ajustes
                    </li>
                    <li>
                        <span></span>{{ Auth::user()->nombre }} <span></span>

                    </li>
                </ul>
            </div>
            <div id="contenido-dinamico">
                <div id="contenedor-contenidoGeneral">
                    @yield('contenidoGeneral')
                </div>
                <div id="contenedor-contenidoReservas">
                    @yield('contenidoReservas')</div>
                <div id="contenedor-contenidoSuscripcion">
                    @yield('contenidoSuscripcion')</div>
                <div id="contenedor-contenidoContraseña">
                    @yield('contenidoContraseña')</div>
                <div id="contenedor-contenidoOtros">
                    @yield('contenidoOtros')</div>
            </div>
        </div>
    </div>
</body>

</html>
