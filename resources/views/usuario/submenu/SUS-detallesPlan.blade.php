@extends('usuario.suscripcion')
@section('detallesPlan')
     <div class="container mt-5">
        <h1 class="mb-4">Detalles de la Suscripción</h1>
        <div class="card">
            <div class="card-header">
                <h2>{{ $suscripcion->name }}</h2>
            </div>
            <div class="card-body">
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
