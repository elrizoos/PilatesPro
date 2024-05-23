@extends('admin.panel-control')

@section('CONT-seleccionarApartado')
    <div>
        <form action="{{ route('seleccionarOrden', ['seccion' => $idSeccion]) }}" method="POST">
            @csrf
            <select name="orden">
                @foreach ($secciones as $seccion)
                    <option value="encima {{ $seccion->titulo }}">{{ 'Encima de ' . $seccion->titulo }}</option>
                    <option value="debajo {{ $seccion->titulo }}">{{ 'Debajo de ' . $seccion->titulo }}</option>
                @endforeach
            </select>
            <input type="submit" value="Finalizar">
        </form>
        <div>
            @foreach ($secciones as $seccion)
                @php
                    $imagen = $imagenes['Seccion: ' . $seccion->id . ': ' . $seccion->titulo]['imagenUno'];
                @endphp
                @switch($seccion->seccion->tipo)
                    @case('2ciz')
                        <div>
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
                            <span></span>
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
