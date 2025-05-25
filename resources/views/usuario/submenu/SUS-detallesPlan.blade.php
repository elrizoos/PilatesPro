@extends('usuario.suscripcion')
@section('detallesPlan')
     <div class="container mt-5 d-flex flex-column justify-content-center align-items-center">
        <h1 class="mb-4 fs-2 text-uppercase">Detalles de la Suscripción</h1>
        <div class="card bg-color-fondo">
            <div class="card-header texto-color-titulo">
                <h2 class="fs-2">{{ $suscripcion->name }}</h2>
            </div>
            <div class="card-body texto-color-gris">
                <p><strong>Descripción:</strong> {{ $suscripcion->description }}</p>
                <p><strong>Precio:</strong> ${{ $suscripcion->precio }}</p>
                <p><strong>Clases Semanales:</strong> {{ $suscripcion->infoSuscripcion->clases_semanales }}</p>
                <p><strong>Tiempo de Clase:</strong> {{ $suscripcion->infoSuscripcion->tiempo_clase }} minutos</p>
                <p><strong>Asesoramiento:</strong> {{ $suscripcion->infoSuscripcion->asesoramiento == 1 ? 'Incluido' : 'No incluido' }}</p>
                <p><strong>Beneficios:</strong> {{ $suscripcion->infoSuscripcion->beneficios }}</p>
                <p><strong>Días de Cancelación:</strong> {{ $suscripcion->infoSuscripcion->dias_cancelacion }}</p>
            </div>
        </div>
    </div>
    @vite(['resources/js/contenidoInterno.js'])
@endsection
