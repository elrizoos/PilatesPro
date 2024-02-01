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
<body>
    <div id="app">
        <nav class="navbar">
            <div class="logo">
                <img src="{{asset('imagenes/logo.png')}}" alt="">
            </div>
            <div class="lista">
                <ul>
                    <li><a class="activeMenu" href="{{ route('inicio') }}">Inicio</a></li>
                    <li><a  href="{{ route('acercaDe') }}">Acerca de</a></li>
                    <li><a href="{{ route('clases') }}">Clases</a></li>
                    <li><a href="{{ route('horarios') }}">Horario</a></li>
                    <li><a href="{{ route('instructores') }}">Instructores</a></li>
                    <li><a href="{{ route('reservas') }}">Reservas</a></li>
                    <li><a href="{{ route('preciosVIP') }}">Precios y VIP</a></li>
                    <li><a href="{{ route('contacto') }}">Contacto</a></li>
                </ul>
            </div>
            <div class="botones">
                <ul class="botones-auth">
                    <li class="inicioSesion">Inicio Sesión</li>
                    <li class="registroSesion">Registro</li>
                </ul>
                <ul class="botones-login">
                    <li>I</li>
                    <li>Nombre</li>
                    <li>A</li>
                    <li>T</li>
                    <li>C</li>
                </ul>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
