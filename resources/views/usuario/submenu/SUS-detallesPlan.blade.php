@extends('usuario.suscripcion')
@section('detallesPlan')
    <div class="contenedor-detalles-plan">
        <h2>Detalles del Plan</h2>
        <div class="d-flex flex-row">
            <div class="plan-contratado">
                <div class="datos-plan">
                    <h3>Plan Contratado</h3>
                    <span class="flecha"></span>
                    <h3>{{ $membresiaUsuario->nombre }}</h3>
                </div>
                <div class="contenido-plan">
                    <h4>¿Qué incluye?</h4>
                    <span class="flecha"></span>
                    <h4>{{ $membresiaUsuario->descripcion }}</h4>
                </div>
            </div>
            <div class="estado-plan">
                <div class="{{ $membresiaUsuario->pivot->status == 'active' ? 'estado-activo' : 'estado-inactivo' }}">
                    {{ $membresiaUsuario->pivot->status == 'active' ? 'Activo' : 'Desactivado'}}
                </div>
            </div>
        </div>
        <div class="info-pago">
            <div class="fecha-pago">
                <h4>Fecha Pago</h4>
                <div class="caja-fecha">
                    <p>{{ $arrayFechaPago['dia'] }}</p>
                    <p>{{ $arrayFechaPago['mes'] }}</p>
                    <p>{{ $arrayFechaPago['año'] }}</p>
                </div>
            </div>
            <div class="fecha-proximo-pago">
                <h4>Fecha Próximo Pago</h4>
                <div class="caja-fecha">
                    <p>{{ $arrayFechaFin['dia'] }}</p>
                    <p>{{ $arrayFechaFin['mes'] }}</p>
                    <p>{{ $arrayFechaFin['año'] }}</p>
                </div>
            </div>
            <button class="boton-cancelar">Cancelar Suscripción</button>

        </div>
    </div>
    @vite(['resources/js/contenidoInterno.js'])
@endsection
