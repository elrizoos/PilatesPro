@extends('usuario.suscripcion')
@section('estadoSuscripcion')
    <div class="contenedor-suscripcion">
        <div class="encabezado-suscripcion">
            @if (isset($membresiaUsuario))
                <p>Su suscripción esta activa</p>
            @else
                <p>Aún no dispones de una suscripción activa. Por favor escoge una de las siguientes:</p>
        </div>
        <div class="contenedor-listado-membresia membresias-opciones">
            @foreach ($membresias as $membresia)
                <div class="membresia" id="{{ $membresia->id }}">
                    <h4>{{ $membresia->nombre }}</h4>
                    <h5>{{ $membresia->descripcion }}</h5>
                    <h6>{{ $membresia->precio }}€</h6>
                    <div class="botones-membresia">
                        <form action="{{ route('formularioPago', ['producto' => $membresia->id]) }}" method="GET">
                            @csrf
                            <input type="submit" value="Elegir Suscripción">
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
        @endif
        <div class="contenedor-paquete">
            <div class="contenedor-listado-paquetes productos-opciones">
                @foreach ($productos as $producto)
                    <div class="producto" id="{{ $producto->id }}">
                    <h4>{{ $producto->nombre }}</h4>
                    <h5>{{ $producto->numero_clases }}</h5>
                    <h6>{{ $producto->precio }}€</h6>
                    <div class="botones-membresia">
                        <form action="{{ route('formularioPago', ['producto' => $producto->id]) }}" method="GET">
                            @csrf
                            <input type="submit" value="Elegir Suscripción">
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    @vite(['resources/js/contenidoInterno.js'])
@endsection
