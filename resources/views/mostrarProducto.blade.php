@extends('layouts.app')

@section('mostrarProducto')
    <div class="container-fluid bg-color-fondo w-100 h-100 p-5">
        <h2 class="texto-color-titulo">Detalles del Producto</h2>

        <div class="row mt-4">
            <div class="col-md-8">
                <div class="card bg-color-principal ">
                    <div class="card-header texto-color-resalte fs-3">
                        <h3>{{ $producto->name }}</h3>
                    </div>
                    <div class="card-body">
                        <p class="texto-color-gris p-1"><strong class="texto-color-secundario">Precio:</strong>
                            {{ $producto->precio }}€</p>
                        <p class="texto-color-gris p-1"><strong class="texto-color-secundario">Descripción:</strong>
                            {{ $producto->description }}</p>
                        <p class="texto-color-gris p-1"><strong class="texto-color-secundario">Categoría:</strong>
                            {{ $producto->type == 'membership' ? 'Suscripcion' : 'Paquete de clases' }}</p>
                        <p class="texto-color-gris p-1"><strong class="texto-color-secundario">Numero de clases
                                {{ $producto->type === 'membership' ? 'semanales' : '' }}:</strong>
                            {{ $producto->type == 'membership' ? $producto->infoSuscripcion->clases_semanales : $producto->infoPaquete->numero_clases }}
                            clases</p>
                        <p class="texto-color-gris p-1"><strong class="texto-color-secundario">Tiempo de cada
                                clase:</strong>
                            {{ $producto->type == 'membership' ? $producto->infoSuscripcion->tiempo_clase : $producto->infoPaquete->tiempo_clase }}
                            minutos</p>
                        <p class="texto-color-gris p-1"><strong class="texto-color-secundario">Tipo de
                                asesoramiento:</strong>
                            {{ $producto->type == 'membership' ? $producto->infoSuscripcion->asesoramiento : 'Ninguno' }}
                        </p>
                        <p class="texto-color-gris p-1"><strong class="texto-color-secundario">Días de cancelacion:</strong>
                            {{ $producto->type == 'membership' ? $producto->infoSuscripcion->dias_cancelacion : 'Ninguno' }}
                        </p>
                        <p class="texto-color-gris p-1"><strong class="texto-color-secundario">Beneficios:</strong>
                            {{ $producto->type == 'membership' ? ($producto->infoSuscripcion->beneficios == 0 ? 'Ninguno' : 'Si') : 'Ninguno' }}
                        </p>

                    </div>
                    <div class="card-footer">
                        <a href="{{ route('registrarUsuarioProducto', ['producto' => $producto->id]) }}" class="btn btn-primary">
                            Registrarse y Pagar
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <h4 class="texto-color-titulo mb-4">Otros Productos</h4>
                <ul class="list-group">
                    @foreach ($productos as $prod)
                        <li class="list-group-item  bg-color-principal">
                            <a href="{{ route('mostrarDetallesProducto', ['producto' => $prod->id]) }}">
                                {{ $prod->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
