@extends('admin.panel-control')

@section('CONT-seleccionarApartado')
    <div class="contenedor contenedor-seleccionApartado">
        <form action="{{ route('seleccionarOrden', ['seccion' => $idSeccion]) }}" method="POST">
            @csrf
            <select name="orden">
                @foreach ($secciones as $seccion)
                    <option  value="encima {{$seccion->titulo}}">{{ 'Encima de ' . $seccion->titulo }}</option>
                    <option value="debajo {{$seccion->titulo}}">{{ 'Debajo de ' . $seccion->titulo }}</option>
                @endforeach
            </select>
            <input type="submit" value="Finalizar">
        </form>
        <div class="vista-previa vista-foro">
            @foreach ($secciones as $seccion)
                @switch($seccion->seccion->tipo)
                    @case('2ciz')
                        @php
                            $imagen = $imagenes['Seccion: ' . $seccion->id . ': ' . $seccion->titulo]['imagenUno'];
                        @endphp
                        <div class="seccion seccion-nueva seccion-uno">
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

                    @case('4cel2i')
                        @yield('CONT-estructura-dos')
                    @break

                    @case('1c')
                        @yield('CONT-estructura-tres')
                    @break

                    @case('2cid')
                        @yield('CONT-estructura-cuatro')
                    @break

                    @default
                @endswitch
            @endforeach
        </div>
    </div>
@endsection
