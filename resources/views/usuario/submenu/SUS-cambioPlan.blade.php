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
                    <input id="valor-ruta" type="hidden" name="membresia"
                        data-url="{{ route('calcularNuevoPlan', ['suscripcion' => $suscripcionId, 'membresia' => $membresia->id]) }}">
                    <input id="btnCambiarPlan" type="button" value="Cambiar Plan">
                </div>
            @endforeach
        </div>
        <div id="ventana-emergente"
            class="ventana-seguridad position-absolute flex-column justify-content-md-center align-items-center d-none">
            <p>¿Estás seguro que desea cambiar el plan?</p>
            <form action="{{ route('cancelarOperacion') }}">
                <input type="submit" value="Cancelar">
            </form>

            <form id="form-cambioPlan" action="" method="GET">
                @csrf
                <input type="submit" value="Cambiar plan">
            </form>
        </div>
    </div>
    @vite(['resources/js/contenidoInterno.js'])
    <script>
        $('#btnCambiarPlan').on('click', function() {
            console.log();
            $('#form-cambioPlan').attr('action', $('#valor-ruta').data('url'));

            $('#ventana-emergente').addClass('d-flex');
            $('#ventana-emergente').removeClass('d-none');
        });
    </script>
@endsection
