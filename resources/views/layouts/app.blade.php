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

<body class="bg-color-fondo texto-color-principal overflow-x-hidden">
    <div class="d-flex flex-row" id="appEscritorio">
        @if (Route::currentRouteName() !== 'formularioPago' &&
                Route::currentRouteName() !== 'login' &&
                Route::currentRouteName() !== 'register')
            <nav class="bg-color-principal col-3 position-relative">
                <div class="full-width position-sticky top-0 d-flex flex-column justify-content-between vh-100 p-3">
                    <div class="w-100 h-25">
                        <div class="imagen-logo w-100 h-100 img" id="imagen-logo" data-url="{{ route('inicio') }}">

                        </div>
                    </div>

                    <div class="d-flex flex-column" id="listaMenu">
                        <span></span>
                        <div>
                            <ul class="p-2 text-uppercase">
                                <li class="p-2"><a href="{{ route('inicio') }}">Inicio</a></li>
                                <li class="p-2"><a href="{{ route('acercaDe') }}">Acerca de</a></li>
                                <li class="p-2"><a href="{{ route('clases') }}">Clases</a></li>
                                <li class="p-2"><a href="{{ route('horarios') }}">Horario</a></li>
                                <li class="p-2"><a href="{{ route('instructores') }}">Instructores</a></li>
                                <li class="p-2"><a href="{{ route('reservas') }}">Reservas</a></li>
                                <li class="p-2"><a href="{{ route('preciosVIP') }}">Precios y VIP</a></li>
                                <li class="p-2"><a href="{{ route('contacto') }}">Contacto</a></li>
                                <li class="p-2" id="paginasPersonalizadas">
                                    Más <span></span>
                                </li>
                            </ul>
                            <div class="d-none" id="listaPaginas">
                                <div><span></span></div>
                                <ul>
                                    @foreach ($paginas as $pagina)
                                        <li><a
                                                href="{{ route('mostrarPagina', ['pagina' => $pagina->slug]) }}">{{ $pagina->titulo }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="w-100 p-2">
                        <div>
                            @guest
                                <ul class="w-100 d-flex flex-column gap-2">
                                    <li class="p-4 text-center bg-color-principal rounded-circle border border-warning "><a class="texto-color-secundario text-uppercase" href="{{ route('login') }}">Inicio Sesión</a></li>
                                    <li class="p-4 text-center bg-color-principal rounded-circle border border-warning"><a class="texto-color-secundario text-uppercase" href="{{ route('register') }}">Registro</a></li>
                                </ul>
                            @endguest

                            @auth
                                <ul class="w-100 d-flex flex-column">
                                    <li class="p-2 text-center">{{ Auth::user()->nombre }} {{ Auth::user()->apellidos }}</li>
                                    <li class="p-2 text-center"><a
                                            href="{{ Auth::user()->nombre === 'admin' ? route('panel-control') : route('general-informacion') }}"><span></span>Ajustes</a>
                                    </li>
                                    @if (Auth::user()->nombre !== 'admin')
                                        <li><span></span>Suscripción</li>
                                    @endif
                                    <li class="p-2 text-center">
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button type="submit"><span></span>Salir</button>
                                        </form></a>
                                    </li>
                                </ul>
                            @endauth

                        </div>
                    </div>
                </div>
            </nav>
        @else
        @endif



        <main class="col-9">
            @yield('content')
        </main>
    </div>

</body>

</html>
