@extends('layouts.app')

@section('content')
    <h1>{{ $pagina->titulo }}</h1>
    <p>{{ $pagina->descripcion }}</p>

    @if ($secciones)
        {{-- dd($secciones) --}}
        @foreach ($secciones as $seccion)
            @php
                $imagenUno = $imagenes['Seccion: ' . $seccion->id . ': ' . $seccion->titulo]['imagenUno'];
                $imagenDos = $imagenes['Seccion: ' . $seccion->id . ': ' . $seccion->titulo]['imagenDos'];
                //dd($seccion->titulo);
            @endphp
            @switch($seccion->idSeccion)
                @case(1)
                    <div id="seccion-{{ $seccion->id }}" class="seccion seccion-nueva seccion-uno window-height">
                        <div class="titulo">
                            <h2 class="titulo-seccion">{{ $seccion->titulo }}</h2>
                        </div>
                        <div class="imagen">
                            <div class="imagen-seccion"
                                style="background-image: url( {{ asset('storage/' . $imagenUno->ruta_imagen) }})">

                            </div>
                        </div>
                        <div class="parrafo">
                            <p class="parrafo-seccion">{{ $seccion->parrafo }}</p>
                        </div>
                    </div>
                @break

                @case(2)
                    <div id="seccion-{{ $seccion->id }}" class="seccion seccion-nueva seccion-dos window-height">
                        <div class="titulo">
                            <h2 class="titulo-seccion">{{ $seccion->titulo }}</h2>
                        </div>
                        <div class="imagen imagen-uno">
                            <div class="imagen-seccion "
                                style="background-image: url( {{ asset('storage/' . $imagenUno->ruta_imagen) }})"">
                            </div>
                        </div>
                        <div class="imagen imagen-dos">
                            <div class="imagen-seccion "
                                style="background-image: url( {{ asset('storage/' . $imagenDos->ruta_imagen) }})">
                            </div>
                        </div>
                        <div class="parrafo">
                            <p class="parrafo-seccion">{{ $seccion->parrafo }}</p>
                        </div>
                    </div>
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
