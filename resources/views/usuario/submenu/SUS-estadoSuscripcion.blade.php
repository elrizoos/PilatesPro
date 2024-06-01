@extends('usuario.suscripcion')

@section('estadoSuscripcion')
    @php
        $suscripciones = false;
    @endphp
    <div class="container-fluid text-light">
        <div class="row h-80">
            <div class="col">
                <div class="row h-15">
                    <div class="col-4 d-flex justify-content-center align-items-center gap-4 fs-4">
                        <h3 class="">Estado Suscripcion:</h3>
                        <div class="contenedor-estado {{ isset($activeSubscription) ? 'text-success' : 'text-danger' }}">
                            {{ isset($activeSubscription) ? 'Active' : 'In-Active' }}
                        </div>
                    </div>
                </div>
                <div class="row h-85 overflow-y-auto p-3 {{ !isset($activeSubscription) ? 'row-cols-3' : '' }}">
                    @if (isset($activeSubscription))
                        <div class="col-6 d-flex justify-content-center align-items-center">
                            <ul class="fs-4">
                                <li class="p-1">Nombre de suscripcion: {{ $activeSubscription->name }}</li>
                                <li class="p-1">Fecha de ultimo pago: {{ $activeSubscription->last_payment_date }}</li>
                                <li class="p-1">Fecha fin de periodo: {{ $activeSubscription->end_date }}</li>
                                <li class="p-1">Contenido de la suscripcion: {{ $activeSubscription->content }}</li>
                            </ul>
                        </div>
                        <div class="col-6 fs-4">
                            <ul>
                                <li class="p-1">Numero de clases incluidas: {{ $activeSubscription->included_classes }}</li>
                                <li class="p-1">Numero de clases disponibles: {{ $activeSubscription->available_classes }}</li>
                            </ul>
                        </div>
                    @else
                        @foreach ($productos as $subscription)
                            @if ($subscription->type == 'membership')
                                @php
                                    $suscripciones = true;
                                @endphp
                                <div class="col">
                                    <div data-id="{{ $subscription->id }}"
                                        class="producto-click col text-light d-flex justify-content-center align-items-center">
                                        <ul 
                                            class="h-40 border border-2 border-info p-3 fs-5 d-flex justify-content-center align-items-center flex-column cursor-pointer">
                                            <li class="p-2 text-center text-uppercase">{{ $subscription->name }}</li>
                                            <li class="p-2 text-center">{{ $subscription->description }}</li>
                                            <li class="p-2 text-center">{{ $subscription->quantity }} clases</li>
                                            <li class="p-2 text-center text-danger fs-4">{{ $subscription->precio }}€</li>
                                            <li>
                                                <form id="formularioSeleccion-{{ $subscription->id }}"
                                                    action="{{ route('formularioPago', ['producto' => $subscription->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary">Seleccionar</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        @if ($suscripciones == false)
                            <div class="col d-flex justify-content-center align-items-center">
                                <p>Por el momento no hay suscripciones para activar</p>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col d-flex justify-content-center align-items-center">
                <div class="ver-productos h-50 w-50 d-flex justify-content-center align-items-center fs-3"
                    data-bs-toggle="offcanvas" data-bs-target="#panelProductos" aria-controls="panelProductos">
                    VER PAQUETES DE CLASES
                </div>
            </div>
        </div>
        <div class="offcanvas offcanvas-bottom bg-color-principal texto-color-dorado-claro h-70" tabindex="-1"
            id="panelProductos" aria-labelledby="panelProductosLabel">
            <div class="offcanvas-header d-flex justify-content-between align-items-center" data-bs-theme="dark">
                <h5 class="offcanvas-title fs-2" id="panelProductosLabel">Paquetes de Clases</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"
                    fill="#ffffff"></button>
            </div>
            <div class="offcanvas-body">
                <div class="container-fluid w-100 h-100">
                    <div class="row h-100 row-cols-4">
                        @foreach ($productos as $producto)
                            @if ($producto->type == 'package')
                                <div data-id="{{ $producto->id }}"
                                    class="producto-click col text-light d-flex justify-content-center align-items-center">
                                    <ul
                                        class="h-40 border border-2 border-info p-3 fs-5 d-flex justify-content-center align-items-center flex-column">
                                        <li class="p-2 text-center text-uppercase">{{ $producto->name }}</li>
                                        <li class="p-2 text-center">{{ $producto->description }}</li>
                                        <li class="p-2 text-center">{{ $producto->quantity }} clases</li>
                                        <li class="p-2 text-center text-danger fs-4">{{ $producto->precio }}€</li>
                                        <li>
                                            <form id="formularioSeleccion-{{ $producto->id }}"
                                                action="{{ route('formularioPago', ['producto' => $producto->id]) }}"
                                                method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-primary">Seleccionar</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.producto-click').on('click', function() {
                var id = $(this).data('id');
                $('#formularioSeleccion-' + id).submit();
            });
        });
    </script>
    @vite(['resources/js/contenidoInterno.js'])
@endsection
