@extends('usuario.suscripcion')
@section('detallesPlan')
    <div>
        <h2>Detalles del Plan</h2>
        <div>
            <div>
                <div>
                    <h3>Plan Contratado</h3>
                    <span></span>
                    <h3>{{ $membresiaUsuario->nombre }}</h3>
                </div>
                <div>
                    <h4>¿Qué incluye?</h4>
                    <span></span>
                    <h4>{{ $membresiaUsuario->descripcion }}</h4>
                </div>
            </div>
            <div>
                <div>
                    {{ $membresiaUsuario->pivot->status == 'active' ? 'Activo' : 'Desactivado'}}
                </div>
            </div>
        </div>
        <div>
            <div>
                <h4>Fecha Pago</h4>
                <div>
                    <p>{{ $arrayFechaPago['dia'] }}</p>
                    <p>{{ $arrayFechaPago['mes'] }}</p>
                    <p>{{ $arrayFechaPago['año'] }}</p>
                </div>
            </div>
            <div>
                <h4>Fecha Próximo Pago</h4>
                <div>
                    <p>{{ $arrayFechaFin['dia'] }}</p>
                    <p>{{ $arrayFechaFin['mes'] }}</p>
                    <p>{{ $arrayFechaFin['año'] }}</p>
                </div>
            </div>
            <button>Cancelar Suscripción</button>

        </div>
    </div>
    @vite(['resources/js/contenidoInterno.js'])
@endsection
