@extends('layouts.app')

@section('content')
    <div class="container-fluid bg-color-oscuro w-100 vh-100 p-5">
        <div class="text-center mb-5">
            <h1 class="fs-2 texto-color-titulo text-uppercase">Nuestras Clases</h1>
            <p class="texto-color-gris fs-4">Explora nuestras clases y encuentra la opción perfecta para ti. Ofrecemos una
                variedad de paquetes de clases y suscripciones para adaptarse a tus necesidades.</p>
        </div>

        <div class="row mb-5">
            <div class="col-12">
                <h2 class="texto-color-titulo fs-3 text-center">Paquetes de Clases</h2>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    @foreach ($productos as $producto)
                        @if ($producto->type == 'package')
                            <div class="col">
                                <div class="card h-100 bg-color-fondo">
                                    <div class="card-body">
                                        <h5 class="card-title texto-color-resalte text-center text-uppercase">{{ $producto->name }}</h5>
                                        <p class="card-text texto-color-grisClaro text-center">{{ $producto->description }}</p>
                                        <ul class="p-4 text-center gap-1 list-group list-group-flush">
                                            <li class="bg-color-fondo texto-color-gris">Precio: {{ $producto->precio }}€
                                            </li>
                                            <li class="bg-color-fondo texto-color-gris">Número de Clases:
                                                {{ isset($producto->infoPaquete->numero_clases) ? $producto->infoPaquete->numero_clases : '' }}
                                            </li>
                                            <li class="bg-color-fondo texto-color-gris">Duración de la Clase:
                                                {{ isset($producto->infoPaquete->numero_clases) ? $producto->infoPaquete->tiempo_clase : '' }}
                                                minutos</li>
                                            <li class="bg-color-fondo texto-color-gris">Tiempo de Validez:
                                                {{ isset($producto->infoPaquete->numero_clases) ? $producto->infoPaquete->validez : '' }}
                                                días</li>
                                        </ul>
                                    </div>
                                    
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-12">
                <h2 class="texto-color-titulo fs-3 text-center">Suscripciones</h2>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    @foreach ($productos as $producto)
                        @if ($producto->type == 'membership')
                            <div class="col">
                                <div class="card h-100 bg-color-fondo">
                                    <div class="card-body">
                                        <h5 class="card-title texto-color-resalte  text-center text-uppercase">{{ $producto->name }}</h5>
                                        <p class="card-text texto-color-grisClaro text-center">{{ $producto->description }}</p>
                                        <ul class="text-center p-1 gap-1 list-group list-group-flush">
                                            <li class="bg-color-fondo texto-color-gris">Precio: {{ $producto->precio }}€ /
                                                mes</li>
                                            @if (isset($producto->infoSuscripcion))
                                                <li class="bg-color-fondo texto-color-gris">Clases Semanales:
                                                    {{ $producto->infoSuscripcion->clases_semanales }}</li>
                                                <li class="bg-color-fondo texto-color-gris">Duración de la Clase:
                                                    {{ $producto->infoSuscripcion->tiempo_clase }} minutos</li>
                                                <li class="bg-color-fondo texto-color-gris">Asesoramiento:
                                                    {{ $producto->infoSuscripcion->asesoramiento }}</li>
                                                <li class="bg-color-fondo texto-color-gris">Días para Cancelación:
                                                    {{ $producto->infoSuscripcion->dias_cancelacion }}</li>
                                                <li class="bg-color-fondo texto-color-gris">Beneficios:
                                                    {{ $producto->infoSuscripcion->beneficios ? 'Sí' : 'No' }}</li>
                                            @endif
                                        </ul>
                                    </div>
                                   
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
