@extends('layouts.app')

@section('content')
    @if ($secciones)
        @foreach ($secciones as $seccion)
            @switch($seccion->idSeccion)
                @case(1)
                    @php
                        $imagen = $imagenes[$seccion->titulo]['imagenUno'];
                    @endphp
                    <div>
                        <div>
                            <h2>{{ $seccion->titulo }}</h2>
                        </div>
                        <div>
                            <div
                                style="background-image: url( {{ asset('storage/' . $imagen->ruta_imagen) }})">

                            </div>
                        </div>
                        <div>
                            <p>{{ $seccion->parrafo }}</p>
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
