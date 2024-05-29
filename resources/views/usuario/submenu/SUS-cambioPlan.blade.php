@extends('usuario.suscripcion')
@section('cambioPlan')
    <div>
        <h2>Cambiar plan</h2>
        <p>Aquí puedes elegir el nuevo plan que prefieras</p>
        <div>
            @foreach ($membresias as $membresia)
                <div>
                    <h4>{{ $membresia->nombre }}</h4>
                    <h5>{{ $membresia->descripcion }}</h5>
                    <h6>{{ $membresia->precio }}€</h6>
                    <input id="valor-ruta" type="hidden" name="membresia"
                        data-url="{{ route('calcularNuevoPlan', ['suscripcion' => $suscripcionId, 'membresia' => $membresia->id]) }}">
                    <input id="btnCambiarPlan" type="button" value="Cambiar Plan">
                </div>
            @endforeach
        </div>
        <div id="ventana-emergente">
            <p>¿Estás seguro que desea cambiar el plan?</p>
            <form class="formulario" action="{{ route('cancelarOperacion') }}">
                <input type="submit" value="Cancelar">
            </form>

            <form class="formulario" id="form-cambioPlan" action="" method="GET">
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
