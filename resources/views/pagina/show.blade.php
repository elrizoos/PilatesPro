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
                    <div id="seccion-{{ $seccion->id }}">
                        <div>
                            <h2>{{ $seccion->titulo }}</h2>
                        </div>
                        <div>
                            <div
                                style="background-image: url( {{ asset('storage/' . $imagenUno->ruta_imagen) }})">

                            </div>
                        </div>
                        <div>
                            <p>{{ $seccion->parrafo }}</p>
                        </div>
                    </div>
                @break

                @case(2)
                    <div id="seccion-{{ $seccion->id }}">
                        <div>
                            <h2>{{ $seccion->titulo }}</h2>
                        </div>
                        <div>
                            <div
                                style="background-image: url( {{ asset('storage/' . $imagenUno->ruta_imagen) }})"">
                            </div>
                        </div>
                        <div>
                            <div
                                style="background-image: url( {{ asset('storage/' . $imagenDos->ruta_imagen) }})">
                            </div>
                        </div>
                        <div>
                            <p>{{ $seccion->parrafo }}</p>
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
