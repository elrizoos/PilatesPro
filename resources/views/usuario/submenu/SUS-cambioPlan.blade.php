@extends('usuario.suscripcion')
@section('cambioPlan')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h3>Cambiar de plan</h3>
            </div>
        </div>
        <div class="row">
            @if (isset($productosRestantes[0]))
                hola
            @endif
        </div>
    </div>
    @vite(['resources/js/contenidoInterno.js'])
    <script>
        
    </script>
@endsection
