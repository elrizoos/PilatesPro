@extends('usuario.suscripcion')

@section('estadoSuscripcion')
    @php
        $suscripciones = false;
    @endphp
    @if (session()->has('success') && session()->has('factura'))
        @dd(session('factura'))
    @endif
    <div class="container-fluid text-light">
        <div class="row h-80">
            <div class="col">
                <div class="row  h-15">
                    <div class="col d-flex justify-content-center align-items-center ">
                        <div class="d-flex gap-4 fs-4 border-bottom w-75 justify-content-center align-items-center p-3">
                            <h3 class="">Estado Suscripcion:</h3>
                            <div class="contenedor-estado {{ isset($activeSubscription) ? 'text-success' : 'text-danger' }}">
                                {{ isset($activeSubscription) ? 'Active' : 'In-Active' }}
                            </div>
                            <div class="fs-4 d-flex justify-content-center align-items-center {{isset($activeSubscription) ? 'd-none' : '' }}">
                                <ul class="">
                                    <li class=" text-center">Clases disponibles: <span
                                            class=" texto-color-dorado">{{ Auth::user()->numero_clases }}</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row h-85 overflow-y-auto p-3 {{ !isset($activeSubscription) ? 'row-cols-3' : '' }}">
                    @if (isset($activeSubscription))
                        <div class="col-6 d-flex justify-content-center align-items-center">
                            <ul class="fs-4">
                                <li class="p-2 mb-4 fs-3 text-center"> {{ $activeSubscription->name }}</li>
                                <li>
                                    <ul class="d-flex gap-2">
                                        <li class="p-2 text-center bg-color-fondo-claro">
                                            <h3>Fecha de ultimo pago:</h3>
                                            <span class="text-success">{{ $fechaUltimoPago }}</span>
                                        </li>
                                        <li class="p-2 text-center bg-color-fondo-claro">
                                            <h3>Fecha fin de periodo: </h3>
                                            <span class="text-danger-emphasis">{{ date('D, d M, y', $fechaFinPeriodo) }}</span>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="col-6 fs-4 d-flex justify-content-center align-items-center">
                            <ul class="w-50">
                                <li class=" p-5 border border-2 border-fondo text-center">Clases disponibles: <span
                                        class="fs-2 texto-color-dorado">{{ Auth::user()->numero_clases }}</span></li>
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
                                            class=" border border-2 border-dorado p-3 fs-5 d-flex justify-content-center align-items-center flex-column cursor-pointer">
                                            <li class="p-2 text-center text-uppercase">{{ $subscription->name }}</li>
                                            <li class="p-2 text-center">{{ $subscription->description }}</li>
                                            <li class="p-2 text-center">{{ $subscription->quantity }} clases</li>
                                            <li class="p-2 text-center text-warning fs-4">{{ $subscription->precio }}€</li>
                                            <li>
                                                <form id="formularioSeleccion-{{ $subscription->id }}"
                                                    action="{{ route('formularioPago', ['producto' => $subscription->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success">Seleccionar</button>
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
                                        class=" border border-2 border-dorado p-3 fs-5 d-flex justify-content-center align-items-center flex-column">
                                        <li class="p-2 text-center text-uppercase">{{ $producto->name }}</li>
                                        <li class="p-2 text-center">{{ $producto->description }}</li>
                                        <li class="p-2 text-center">{{ $producto->quantity }} clases</li>
                                        <li class="p-2 text-center text-warning fs-4">{{ $producto->precio }}€</li>
                                        <li>
                                            <form id="formularioSeleccion-{{ $producto->id }}"
                                                action="{{ route('formularioPago', ['producto' => $producto->id]) }}"
                                                method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-success">Seleccionar</button>
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
