@extends('layouts.app')

@section('content')
    <h1>{{ $pagina->titulo }}</h1>
    <p>{{ $pagina->descripcion }}</p>

    @if ($secciones)
        {{-- dd($secciones) --}}
        @foreach ($secciones as $seccion)
            @switch($seccion->idSeccion)
                @case(1)
                    @php
                        $imagen = $imagenes['Seccion: ' . $seccion->id . ': ' . $seccion->titulo]['imagenUno'];
                        //dd($seccion->titulo);
                    @endphp
                    <div id="seccion-{{ $seccion->id }}" class="seccion seccion-nueva seccion-uno window-height">
                        <div class="titulo">
                            <h2 class="titulo-seccion">{{ $seccion->titulo }}</h2>
                        </div>
                        <div class="imagen">
                            <div class="imagen-seccion"
                                style="background-image: url( {{ asset('storage/' . $imagen->ruta_imagen) }})">

                            </div>
                        </div>
                        <div class="parrafo">
                            <p class="parrafo-seccion">{{ $seccion->parrafo }}</p>
                        </div>
                    </div>
                @break

                @case(2)
                    @yield('CONT-estructura-dos')
                @break

                @case(3)
                    @yield('CONT-estructura-tres')
                @break

                @case(4)
                    @yield('CONT-estructura-cuatro')
                @break

                @default
            @endswitch
        @endforeach
    @endif
@endsection
