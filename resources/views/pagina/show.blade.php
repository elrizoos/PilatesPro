@extends('layouts.app')

@section('content')
    @if ($secciones)
        @foreach ($secciones as $seccion)
            @php
                $clave = 'Seccion: ' . $seccion->id . ': ' . $seccion->titulo;
                $imagenUno = $imagenes[$clave]['imagenUno'] ?? null;
                $imagenDos = $imagenes[$clave]['imagenDos'] ?? null;
                $tipo = $imagenes[$clave]['tipo'] ?? null;
            @endphp

            @switch($tipo)
                @case('imagen-derecha')
                    <div class="contenedor-seccion bg-color-fondo w-100 vh-100">
                        <div class="div1 titulo-seccion-previa">
                            <h3>{{ $seccion->titulo }}</h3>
                        </div>
                        <div class="div2 parrafo-seccion-previa">
                            <p>{{ $seccion->parrafo }}</p>
                        </div>
                        <div class="div3 imagen-seccion-previa">
                            <img class="img-fluid w-90" src="{{ asset('storage/' . $imagenUno->ruta_imagen) }}" alt="">
                        </div>
                    </div>
                @break

                @case('imagen-izquierda')
                    <div class="contenedor-seccion bg-color-fondo w-100 vh-100">
                        <div class="div1 titulo-seccion-previa">
                            <h3>{{ $seccion->titulo }}</h3>
                        </div>
                        <div class="div3 imagen-seccion-previa">
                            <img class="img-fluid w-90" src="{{ asset('storage/' . $imagenUno->ruta_imagen) }}" alt="">
                        </div>
                        <div class="div2 parrafo-seccion-previa">
                            <p>{{ $seccion->parrafo }}</p>
                        </div>
                    </div>
                @break

                @case('dos-imagenes')
                    <div class="contenedor-seccion contenedor-dos bg-color-fondo w-100 vh-100">
                        <div class="div1 titulo-seccion-previa">
                            <h3>{{ $seccion->titulo }}</h3>
                        </div>
                        <div class="div2 imagen-seccion-previa">
                            <img class="img-fluid w-90" src="{{ asset('storage/' . $imagenUno->ruta_imagen) }}" alt="">
                        </div>
                        <div class="div3 imagen-seccion-previa">
                            <img class="img-fluid w-90" src="{{ asset('storage/' . $imagenDos->ruta_imagen) }}" alt="">
                        </div>
                        <div class="div4 parrafo-seccion-previa">
                            <p>{{ $seccion->parrafo }}</p>
                        </div>

                    </div>
                @break

                @case('sin-imagen')

                    @default
                        <div
                            class="container-fluid w-100 vh-100 d-flex flex-column justify-content-center align-items-center bg-color-fondo">
                            <div class="row w-100 h-25">
                                <div class="col d-flex justify-content-center align-items-center">
                                    <h1 class="fs-1 texto-color-resalte text-uppercase text-center">{{ $seccion->titulo }}</h1>
                                </div>
                            </div>
                            <div class="row w-100 h-75">
                                <div class="col d-flex justify-content-center align-items-center">
                                    <p class="fs-4 texto-color-secundario text-center p-4">{{ $seccion->parrafo }}</p>
                                </div>
                            </div>
                        </div>
                    @break
                @endswitch
            @endforeach
        @endif
    @endsection
