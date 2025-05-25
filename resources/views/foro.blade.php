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
                            <div style="background-image: url( {{ asset('storage/' . $imagen->ruta_imagen) }})">

                            </div>
                        </div>
                        <div>
                            <p>{{ $seccion->parrafo }}</p>
                        </div>
                    </div>
                @break

                @case(2)
                    @php
                        $imagenUno = $imagenes[$seccion->titulo]['imagenUno'];
                        $imagenDos = $imagenes[$seccion->titulo]['imagenDos'];
                    @endphp
                    <div class="contenedor-grid-seccion-dos w-75 h-100 border ">
                        <div class="titulo  d-flex justify-content-center align-items-center fs-3">
                            <h1 class="fs-1 texto-color-resalte text-uppercase text-center">{{ $seccion->titulo }}</h1>
                        </div>
                        <div class="imagen-uno p-2">
                            <div id="imagen-upload-imagenUno" class=" w-100 h-100">
                                <div class="img-fluid imagen w-100 h-100 p-4"
                                    style="background-image: url( {{ asset('storage/' . $imagenUno->ruta_imagen) }})">
                                </div>
                            </div>
                        </div>
                        <div class="imagen-dos p-2">
                            <div id="imagen-upload-imagenDos" class=" w-100 h-100">
                                <div class="img-fluid imagen w-100 h-100 p-4"
                                    style="background-image: url( {{ asset('storage/' . $imagenDos->ruta_imagen) }})">
                                </div>
                            </div>
                        </div>
                        <div class="parrafo d-flex justify-content-center align-items-center">
                            <p class="w-100 h-100 fs-4 texto-color-secundariotext-center p-4">{{ $seccion->parrafo }}</p>
                        </div>
                    </div>
                @break

                @case(3)
                    <div class="container-fluid  w-75 h-75 position-relative border border-1 rounded-5">
                        <div class="row h-25">
                            <div class="col">
                                <h1 class="fs-1 texto-color-resalte text-uppercase text-center">{{ $seccion->titulo }}</h1>
                            </div>
                        </div>
                        <div class="row h-75">
                            <div class="col">
                                <p class="w-100 h-100 fs-4 texto-color-secundariotext-center p-4">{{ $seccion->parrafo }}</p>
                            </div>
                        </div>
                    </div>
                @break

                @case(4)
                      @switch($imagen)
        @case('der')
            <div class="container-fluid  w-75 h-75 position-relative border border-1 rounded-5">
                <div class="row h-25">
                    <div class="col">
                        <h1 class="fs-1 texto-color-resalte text-uppercase text-center">{{ $seccion->titulo }}</h1>
                    </div>
                </div>
                <div class="row h-75">
                    <div class="col">
                        <p class="w-100 h-100 fs-4 texto-color-secundariotext-center p-4">{{ $seccion->parrafo }}</p>
                    </div>
                    <div class="col">
                        <div class="img-fluid imagen w-100 h-100 p-4"
                            style="background-image: url( {{ asset('storage/' . $imagenUno->ruta_imagen) }})">
                        </div>
                    </div>
                </div>
            </div>
        @break

        @case('izq')
            <div class="container-fluid  w-75 h-75 position-relative border border-1 rounded-5">
                <div class="row h-25">
                    <div class="col">
                        <h1 class="fs-1 texto-color-resalte text-uppercase text-center">{{ $seccion->titulo }}</h1>
                    </div>
                </div>
                <div class="row h-75">
                    <div class="col">
                        <div class="img-fluid imagen w-100 h-100 p-4"
                            style="background-image: url( {{ asset('storage/' . $imagenUno->ruta_imagen) }})">
                        </div>
                    </div>
                    <div class="col">
                        <p class="w-100 h-100 fs-4 texto-color-secundariotext-center p-4">{{ $seccion->parrafo }}</p>
                    </div>
                </div>
            </div>
        @break

        @default
                @break

                @default
            @endswitch
        @endforeach
    @endif
@endsection
