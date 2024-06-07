@extends('usuario.suscripcion')
@section('cambioPlan')
    <div class="container-fluid ">
        <div class="row">
            <div class="col text-center p-4 fs-5">
                <h3>Cambiar de plan</h3>
                <p>Puedes cambiar de suscripcion siempre que quieras</p>
            </div>
        </div>
        <div class="row p-5">
            <div class="container-fluid">
                <div class="row row-cols-4 overflow-y-hidden">
                    @if (isset($productosRestantes))
                        @foreach ($productosRestantes as $subscription)
                            @if ($subscription->type == 'membership')
                                @php
                                    $suscripciones = true;
                                @endphp
                                <div class="col">
                                    <div data-id="{{ $subscription->id }}"
                                        class="producto-click col texto-color-resalte d-flex justify-content-center align-items-center">
                                        <ul
                                            class=" border border-2 border-dorado p-3 fs-5 d-flex justify-content-center align-items-center flex-column cursor-pointer">
                                            <li class="p-2 text-center text-uppercase">{{ $subscription->name }}</li>
                                            <li class="p-2 text-center">{{ $subscription->description }}</li>
                                            <li class="p-2 text-center">{{ $subscription->quantity }} clases</li>
                                            <li class="p-2 text-center text-warning fs-4">{{ $subscription->precio }}€</li>
                                            <li>
                                                <form id="formularioSeleccion-{{ $subscription->id }}"
                                                    action="{{ route('cambiarPlan', ['producto' => $subscription->id]) }}"
                                                    method="GET">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success">Seleccionar</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        @if (!isset($suscripciones) || $suscripciones == false)
                            <div class="col-12 d-flex fs-5 justify-content-center align-items-center">
                                <p>Por el momento no hay suscripciones para activar</p>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
    @vite(['resources/js/contenidoInterno.js'])
    <script></script>
@endsection
