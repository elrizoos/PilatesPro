@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="contenedor-pago">
            <div class="div-logo">
                <div id="imagen-logo" class="imagen-logo" data-url="{{ route('inicio') }}"></div>
            </div>
            <div class="formulario-pago">
                <div class="contenedor-detalles-pago">
                    <h6>Membresia: {{ isset($membresia->nombre) ? $membresia->nombre : 'Error' }}</h6>
                    <h6>Precio: {{ isset($membresia->precio) ? $membresia->precio . '€' : 'Error' }}</h6>
                    <h6>Fecha compra: {{ now()->format('d/m/y') }}</h6>
                    <h6>Usuario: {{ Auth::user()->nombre }} {{ Auth::user()->apellidos }}</h6>

                    <input id="input-mas-detalles-pago" class="input-mas-detalles-pago" type="button" value="Más detalles">
                    <div class="mas-detalles-pago">
                        <p>Características de la membresía</p>
                        <p>{{ $membresia->descripcion }}</p>
                    </div>
                </div>
                <div class="contenedor-datos-pago">
                    <form action="{{ route('pagar', ['usuario' => Auth::user()->id, 'membresia' => $membresia->id]) }}" method="POST" id="payment-form">
                        @csrf
                        <div class="contenedor-inputs-pago">
                            <input class="estilo-formulario" type="text" name="name" placeholder="Nombre y Apellidos" required  value="{{ Auth::user()->nombre }} {{ Auth::user()->apellidos }}">
                            <div id="card-element">

                            </div>
                        </div>
                        <div class="grupo-formulario">
                            <input type="submit" value="Comprar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://js.stripe.com/v3/"></script>
    <script>
        var stripe = Stripe('{{ env('STRIPE_KEY') }}');
        var elements = stripe.elements();

        var style = {
            base: {
                color: '#e6d5b3',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '1.1em',
                '::placeholder': {
                    color: '#ffffff80'
                },
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };


        var card = elements.create('card', { style: style });
        card.mount('#card-element');

        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    // Display error.message in your UI.
                } else {
                    // Send the token to your server.
                    var hiddenInput = document.createElement('input');
                    hiddenInput.setAttribute('type', 'hidden');
                    hiddenInput.setAttribute('name', 'stripeToken');
                    hiddenInput.setAttribute('value', result.token.id);
                    form.appendChild(hiddenInput);

                    form.submit();
                }
            });
        });
    </script>
@endsection
