<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario Pago</title>
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="bg-color-principal vh-100 text-light">
    <div class="container-fluid h-100">
        <div class="row h-20">
            <div class="col">
                <div class="img-fluid imagen-logo w-100 h-100" id="imagen-logo" data-url="{{ route('inicio') }}"></div>
            </div>
        </div>
        <div class="row h-5 ps-3">
            <div class="col">
                <- VOLVER </div>
            </div>
            <div class="row h-75 p-3">
                <div class="col d-flex justify-content-center align-items-center">
                    <div
                        class="texto-color-principal p-4 h-50 d-flex flex-column justify-content-center align-items-center border border-2 border-info-subtle">
                        <h1 class="fs-2 p-2">
                            {{ $producto->type == 'membership' ? 'Suscríbete a ' : '' }}{{ $producto->name }} </h1>
                        <h2 class="fs-3 p-2">Precio a pagar: <b class="text-danger fs-2">{{ $producto->precio }}€</b>
                        </h2>
                        <h2 class="fs-3 p-2">Detalles: <br> {{ $producto->description }}</h2>
                    </div>
                </div>
                <div class="col d-flex justify-content-center align-items-center">
                    <div class="bg-color-fondo-claro w-95 h-95 shadow-lifted p-4 d-flex flex-column justify-content-center align-items-center">
                        <h2 class="fs-2 text-uppercase text-center p-2 texto-color-secundario">Formulario de Pago</h2>
                        <form class="w-80" id="payment-form"
                            action="{{ route('pagar', ['producto' => $producto->id]) }}" method="POST">
                            @csrf
                            <div class="form-group p-2">
                                <label for="name">Nombre Completo</label>
                                <input type="text" id="name" name="name" class="form-control bg-color-fondo-oscuro border-0" required>
                            </div>
                            <div class="form-group p-2">
                                <label for="email">Correo Electrónico</label>
                                <input type="email" id="email" name="email" class="form-control bg-color-fondo-oscuro border-0" required>
                            </div>
                            <div class="form-group p-2">
                                <label for="card-number-element">Número de Tarjeta</label>
                                <div id="card-number-element" class="form-control bg-color-fondo-oscuro border-0">
                                </div>
                            </div>
                            <div class="form-group p-2 row">
                                <div class="form-group col-md-6">
                                    <label for="card-expiry-element">Fecha de Vencimiento</label>
                                    <div id="card-expiry-element" class="form-control bg-color-fondo-oscuro border-0">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="card-cvc-element">CVC</label>
                                    <div id="card-cvc-element" class="form-control bg-color-fondo-oscuro border-0">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group p-2">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="save-card" name="save_card">
                                    <label class="form-check-label" for="save-card">Guardar mis datos para futuros
                                        pagos</label>
                                </div>
                            </div>
                            <div class="form-group p-2 d-flex justify-content-center align-items-center">
                                <button type="submit" id="submit"
                                    class="estilo-formulario estilo-formulario-enviar w-50 fs-3 text-uppercase">Pagar</button>
                            </div>
                            <div id="card-errors" role="alert" class="text-danger mt-3"></div>
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
                    color: '#32325d',
                    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                    fontSmoothing: 'antialiased',
                    fontSize: '16px',
                    '::placeholder': {
                        color: '#aab7c4'
                    }
                },
                invalid: {
                    color: '#fa755a',
                    iconColor: '#fa755a'
                }
            };

            var cardNumberElement = elements.create('cardNumber', {
                style: style
            });
            var cardExpiryElement = elements.create('cardExpiry', {
                style: style
            });
            var cardCvcElement = elements.create('cardCvc', {
                style: style
            });

            cardNumberElement.mount('#card-number-element');
            cardExpiryElement.mount('#card-expiry-element');
            cardCvcElement.mount('#card-cvc-element');

            var form = document.getElementById('payment-form');

            form.addEventListener('submit', function(event) {
                event.preventDefault();

                stripe.createPaymentMethod({
                    type: 'card',
                    card: cardNumberElement,
                    billing_details: {
                        email: document.getElementById('email').value,
                    },
                }).then(function(result) {
                    if (result.error) {
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                    } else {
                        var hiddenInput = document.createElement('input');
                        hiddenInput.setAttribute('type', 'hidden');
                        hiddenInput.setAttribute('name', 'payment_method_id');
                        hiddenInput.setAttribute('value', result.paymentMethod.id);
                        form.appendChild(hiddenInput);

                        var saveCardInput = document.createElement('input');
                        saveCardInput.setAttribute('type', 'hidden');
                        saveCardInput.setAttribute('name', 'save_card');
                        saveCardInput.setAttribute('value', document.getElementById('save-card').checked ?
                            'true' : 'false');
                        form.appendChild(saveCardInput);

                        form.submit();
                    }
                });
            });
        </script>
</body>
