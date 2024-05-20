@extends('usuario.suscripcion')
@section('cambioPlan')
    <div class="contenedor-membresia width-complete">
        <h2>Cambiar plan</h2>
        <p>Aquí puedes elegir el nuevo plan que prefieras</p>
        <div class="contenedor-listado-membresia">
            @foreach ($membresias as $membresia)
                <div class="membresia">
                    <h4>{{ $membresia->nombre }}</h4>
                    <h5>{{ $membresia->descripcion }}</h5>
                    <h6>{{ $membresia->precio }}€</h6>
                    <form action="{{ route('suscripcion-cambiar', ['membresia' => $membresia->id, 'suscripcion' => $suscripcionId]) }}" method="GET">
                        @csrf
                        <input type="submit" value="Cambiar plan">
                    </form>
                </div>
            @endforeach
        </div>
    </div>
    @vite(['resources/js/contenidoInterno.js'])
@endsection
