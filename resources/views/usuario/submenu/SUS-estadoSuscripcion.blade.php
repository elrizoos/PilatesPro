@extends('usuario.suscripcion')
@section('estadoSuscripcion')
    <div class="contenedor-suscripcion">
        <div class="encabezado-suscripcion">
            @if (isset($membresia))
                <p>Su suscripción esta activa</p>
            @else
                <p>Aún no dispones de una suscripción activa. Por favor escoge una de las siguientes:</p>
            @endif

        </div>
        <div class="contenedor-listado-membresia membresias-opciones">
            @foreach ($membresias as $membresia)
                <div class="membresia" id="{{ $membresia->id }}">
                    <h4>{{ $membresia->nombre }}</h4>
                    <h5>{{ $membresia->descripcion }}</h5>
                    <h6>{{ $membresia->precio }}€</h6>
                    <div class="botones-membresia">
                        <form action="{{ route('formularioPago', ['membresia' => $membresia->id]) }}" method="GET">
                            @csrf
                            <input type="submit" value="Elegir Suscripción">
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @vite(['resources/js/contenidoInterno.js'])
@endsection
