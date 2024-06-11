@extends('admin.panel-control')

@section('CONT-seleccionarApartado')
    <div class="position-relative container-fluid w-100 h-100 d-flex justify-content-center align-items-center">
        <form class="formulario" action="{{ route('seleccionarOrden', ['seccion' => $idSeccion]) }}" method="POST">
            @csrf
            <select class="estilo-formulario estilo-formulario-select" name="orden">
                @foreach ($secciones as $seccion)
                    <option value="encima {{ $seccion->titulo }}">{{ 'Encima de ' . $seccion->titulo }}</option>
                    <option value="debajo {{ $seccion->titulo }}">{{ 'Debajo de ' . $seccion->titulo }}</option>
                @endforeach
            </select>
            <input class="estilo-formulario estilo-formulario-enviar" type="submit" value="Finalizar">
        </form>
        <div class=" position-absolute end-0 me-5 w-25 h-50 overflow-y-scroll d-flex flex-column gap-2">
            @foreach ($secciones as $seccion)
                @php
                    $imagen = $imagenes['Seccion: ' . $seccion->id . ': ' . $seccion->titulo]['imagenUno'];
                @endphp
                @switch($seccion->seccion->tipo)
                    @case('2ciz')
                        <div class="container-fluid w-75 h-75 p-2 position-relative border border-1 rounded-2">
                            <div class="row h-25">
                                <div class="col">
                                    <h1 class="fs-5 texto-color-resalte text-uppercase text-center">{{ $seccion->titulo }}</h1>
                                </div>
                            </div>
                            <div class="row h-75">
                                <div class="col">
                                    <p class="w-100 h-100 fs-6 texto-color-secundariotext-center p-4">{{ $seccion->parrafo }}</p>
                                </div>
                                <div class="col">
                                    <div class="img-fluid imagen w-100 h-100 p-4"
                                        style="background-image: url( {{ asset('storage/' . $imagen->ruta_imagen) }})">
                                    </div>
                                </div>
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
