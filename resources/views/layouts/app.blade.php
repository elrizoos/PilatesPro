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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        @if (Route::currentRouteName() !== 'login' && Route::currentRouteName() !== 'registro')
            <nav class="navbar">
                <div class="logo">
                    <img src="{{ asset('imagenes/logo.png') }}" alt="">
                </div>
                <div class="lista">
                    <ul>
                        <li><a class="activeMenu" href="{{ route('inicio') }}">Inicio</a></li>
                        <li><a href="{{ route('acercaDe') }}">Acerca de</a></li>
                        <li><a href="{{ route('clases') }}">Clases</a></li>
                        <li><a href="{{ route('horarios') }}">Horario</a></li>
                        <li><a href="{{ route('instructores') }}">Instructores</a></li>
                        <li><a href="{{ route('reservas') }}">Reservas</a></li>
                        <li><a href="{{ route('preciosVIP') }}">Precios y VIP</a></li>
                        <li><a href="{{ route('contacto') }}">Contacto</a></li>
                    </ul>
                </div>
                <div class="botones">
                    @guest
                        <ul class="botones-auth">
                            <li class="inicioSesion"><a href="{{ route('login') }}">Inicio Sesión</a></li>
                            <li class="registroSesion"><a href="{{ route('registro') }}">Registro</a></li>
                        </ul>
                    @endguest

                    @auth
                        <ul class="botones-login">
                            <li>{{Auth::user()->nombre}} {{Auth::user()->apellidos}}</li>
                            <li class="icono-ajustes"><a href="{{route('configuracion-usuario')}}"><span></span></a></li>
                            <li class="icono-suscripcion"><span></span></li>
                        </ul>
                    @endauth

                </div>
            </nav>
        @else
        @endif



        <main
            class="{{ Route::currentRouteName() !== 'login' && Route::currentRouteName() !== 'registro' ? 'py-4' : 'main-auth' }}">
            @yield('content')
        </main>
    </div>
</body>

</html>
