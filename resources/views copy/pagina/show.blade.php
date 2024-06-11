@extends('layouts.app')

@section('content')
    @if ($secciones)
        @foreach ($secciones as $seccion)
            @php
                $imagenUno = $imagenes['Seccion: ' . $seccion->id . ': ' . $seccion->titulo]['imagenUno'] ?? null;
                $imagenDos = $imagenes['Seccion: ' . $seccion->id . ': ' . $seccion->titulo]['imagenDos'] ?? null;
                $tipo = $imagenes['Seccion: ' . $seccion->id . ': ' . $seccion->titulo]['tipo'] ?? null;
            @endphp

            @switch($seccion->idSeccion)
                @case(1)
                    @if ($imagenUno)
                        @switch($tipo)
                            @case('2cid')

                                <div class="container-fluid bg-color-fondo w-100 vh-100 position-relative border border-1 rounded-5">
                                    <div class="row h-25">
                                        <div class="col d-flex justify-content-center align-items-center">
                                            <h1 class="fs-1 texto-color-resalte text-uppercase text-center">{{ $seccion->titulo }}</h1>
                                        </div>
                                    </div>
                                    <div class="row h-75">
                                        <div class="col d-flex justify-content-center align-items-center">
                                            <p class=" fs-4 texto-color-secundariotext-center p-4">{{ $seccion->parrafo }}</p>
                                        </div>
                                        <div class="col d-flex justify-content-center align-items-center">
                                            <div class="img-fluid imagen w-100 h-75"
                                                style="background-image: url( {{ asset('storage/' . $imagenUno->ruta_imagen) }})">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @break

                            @case('2ciz')

                                <div class="container-fluid bg-color-fondo w-100 vh-100 position-relative border border-1 rounded-5">
                                    <div class="row h-25">
                                        <div class="col d-flex justify-content-center align-items-center">
                                            <h1 class="fs-1 texto-color-resalte text-uppercase text-center">{{ $seccion->titulo }}</h1>
                                        </div>
                                    </div>
                                    <div class="row h-75">
                                        <div class="col d-flex justify-content-center align-items-center">
                                            <div class="img-fluid imagen w-100 h-75 p-5"
                                                style="background-image: url( {{ asset('storage/' . $imagenUno->ruta_imagen) }})">
                                            </div>
                                        </div>
                                        <div class="col d-flex justify-content-center align-items-center">
                                            <p class=" fs-4 texto-color-secundario text-center p-4">{{ $seccion->parrafo }}</p>
                                        </div>
                                    </div>
                                </div>
                            @break

                            @default
                            @break
                        @endswitch
                    @else
                        <div class="container-fluid bg-color-fondo w-100 vh-100 position-relative border border-1 rounded-5">
                            <div class="row h-25">
                                <div class="col d-flex justify-content-center align-items-center">
                                    <h1 class="fs-1 texto-color-resalte text-uppercase text-center">{{ $seccion->titulo }}</h1>
                                </div>
                            </div>
                            <div class="row h-75">
                                <div class="col d-flex justify-content-center align-items-center">
                                    <p class=" fs-4 texto-color-secundario text-center p-4">{{ $seccion->parrafo }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                @break

                @case(2)
                    <div class="contenedor-grid-seccion-dos w-75 h-100 border">
                        <div class="titulo d-flex justify-content-center align-items-center fs-3">
                            <h1 class="fs-1 texto-color-resalte text-uppercase text-center">{{ $seccion->titulo }}</h1>
                        </div>
                        <div class="imagen-uno p-2">
                            @if ($imagenUno)
                                <div id="imagen-upload-imagenUno" class="w-100 h-100">
                                    <div class="img-fluid imagen w-100 h-75 p-4"
                                        style="background-image: url( {{ asset('storage/' . $imagenUno->ruta_imagen) }})">
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="imagen-dos p-2">
                            @if ($imagenDos)
                                <div id="imagen-upload-imagenDos" class="w-100 h-100">
                                    <div class="img-fluid imagen w-100 h-75 p-4"
                                        style="background-image: url( {{ asset('storage/' . $imagenDos->ruta_imagen) }})">
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="parrafo d-flex justify-content-center align-items-center">
                            <p class=" fs-4 texto-color-secundario text-center p-4">{{ $seccion->parrafo }}</p>
                        </div>
                    </div>
                @break

                @case(3)
                    <div class="container-fluid bg-color-fondo w-100 vh-100 position-relative border border-1 rounded-5">
                        <div class="row h-25">
                            <div class="col d-flex justify-content-center align-items-center">
                                <h1 class="fs-1 texto-color-resalte text-uppercase text-center">{{ $seccion->titulo }}</h1>
                            </div>
                        </div>
                        <div class="row h-75">
                            <div class="col d-flex justify-content-center align-items-center">
                                <p class=" fs-4 texto-color-secundario text-center p-4">{{ $seccion->parrafo }}</p>
                            </div>
                        </div>
                    </div>
                @break

                @case(4)
                    @if ($imagenUno)
                        @switch($tipo)
                            @case('der')
                                <div class="container-fluid bg-color-fondo w-100 vh-100 position-relative border border-1 rounded-5">
                                    <div class="row h-25">
                                        <div class="col d-flex justify-content-center align-items-center">
                                            <h1 class="fs-1 texto-color-resalte text-uppercase text-center">{{ $seccion->titulo }}</h1>
                                        </div>
                                    </div>
                                    <div class="row h-75">
                                        <div class="col d-flex justify-content-center align-items-center">
                                            <p class=" fs-4 texto-color-secundario text-center p-4">{{ $seccion->parrafo }}</p>
                                        </div>
                                        <div class="col d-flex justify-content-center align-items-center">
                                            <div class="img-fluid imagen w-100 h-75 p-4"
                                                style="background-image: url( {{ asset('storage/' . $imagenUno->ruta_imagen) }})">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @break

                            @case('izq')
                                <div class="container-fluid w-100 vh-100 position-relative border border-1 rounded-5">
                                    <div class="row h-25">
                                        <div class="col d-flex justify-content-center align-items-center">
                                            <h1 class="fs-1 texto-color-resalte text-uppercase text-center">{{ $seccion->titulo }}</h1>
                                        </div>
                                    </div>
                                    <div class="row h-75">
                                        <div class="col d-flex justify-content-center align-items-center">
                                            <div class="img-fluid imagen w-100 h-75 p-4"
                                                style="background-image: url( {{ asset('storage/' . $imagenUno->ruta_imagen) }})">
                                            </div>
                                        </div>
                                        <div class="col d-flex justify-content-center align-items-center">
                                            <p class=" fs-4 texto-color-secundariotext-center p-4">{{ $seccion->parrafo }}</p>
                                        </div>
                                    </div>
                                </div>
                            @break

                            @default
                            @break
                        @endswitch
                    @else
                        <div class="container-fluid w-100 vh-100 position-relative border border-1 rounded-5">
                            <div class="row h-25">
                                <div class="col d-flex justify-content-center align-items-center">
                                    <h1 class="fs-1 texto-color-resalte text-uppercase text-center">{{ $seccion->titulo }}</h1>
                                </div>
                            </div>
                            <div class="row h-75">
                                <div class="col d-flex justify-content-center align-items-center">
                                    <p class=" fs-4 texto-color-secundariotext-center p-4">{{ $seccion->parrafo }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                @break

                @default
                @break

            @endswitch
        @endforeach
    @endif
@endsection
