<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Factura</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .info-table {
            width: 100%;
            margin-bottom: 20px;
        }

        .info-table td {
            padding: 5px;
        }

        .info-table span {
            font-weight: bold;
        }

        .info-table th {
            text-align: left;
            padding: 10px;
            background-color: #f2f2f2;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        table th {
            background-color: #f2f2f2;
        }

        .summary-table {
            width: 50%;
            float: right;
            margin-top: 20px;
        }

        .summary-table th,
        .summary-table td {
            text-align: right;
        }

        .summary-table th {
            background-color: #f2f2f2;
        }

        .summary-table td {
            font-weight: bold;
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            max-width: 150px;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.8em;
            color: #555;
        }

        .header,
        .footer {
            width: 100%;
            text-align: center;
            margin-bottom: 20px;
        }

        .header img {
            max-width: 100px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="{{ asset('imagenes/logo.png') }}" alt="Logo Pilates">
        </div>

        <div class="row">
            <div class="col">
                <table class="info-table">
                    <tr>
                        <td><span>Nombre de la empresa:</span> Estudio Pilates</td>
                    </tr>
                    <tr>
                        <td><span>Dirección:</span> Mieres, Asturias</td>
                    </tr>
                    <tr>
                        <td><span>Teléfono:</span> 667667766</td>
                    </tr>
                    <tr>
                        <td><span>Correo electrónico:</span> estudioPilates@gmail.com</td>
                    </tr>
                    <tr>
                        <td><span>Identificación fiscal:</span> 74838374J</td>
                    </tr>
                </table>
            </div>

            <div class="col">
                <table class="info-table">
                    <tr>
                        <th>CLIENTE</th>
                    </tr>
                    <tr>
                        <td><span>Nombre del cliente:</span> {{ $cliente['nombre'] }} {{ $cliente['apellidos'] }}</td>
                    </tr>
                    <tr>
                        <td><span>Teléfono:</span> {{ $cliente['telefono'] }}</td>
                    </tr>
                    <tr>
                        <td><span>Correo electrónico:</span> {{ $cliente['email'] }}</td>
                    </tr>
                    <tr>
                        <td><span>DNI:</span> {{ $cliente['DNI'] }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <table class="info-table">
                    <tr>
                        <th>Factura Nº</th>
                        <td>{{ $facturaArray['numero'] }}</td>
                    </tr>
                    <tr>
                        <th>Fecha de emisión</th>
                        <td>{{ $facturaArray['fecha_emision']->format('d/m/Y') }}</td>
                    </tr>
                    <tr>
                        <th>Fecha de vencimiento</th>
                        <td>{{ $facturaArray['fecha_vencimiento']->format('d/m/Y') }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <h2>Detalles de la Suscripción</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Descripción</th>
                            <th>Cantidad</th>
                            <th>Precio Unitario</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($facturaArray['items'] as $item)
                            <tr>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ number_format($item->amount / 100, 2) }}€</td>
                                <td>{{ number_format(($item->amount * $item->quantity) / 100, 2) }}€</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="summary-table">
                    <table>
                        <tr>
                            <th>Subtotal</th>
                            <td>{{ $facturaArray['subtotal'] }}€</td>
                        </tr>
                        <tr>
                            <th>Impuestos (IVA 21%)</th>
                            <td>{{ $facturaArray['impuestos'] }}€</td>
                        </tr>
                        <tr>
                            <th>Total</th>
                            <td>{{ $facturaArray['total'] }}€</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <p><strong>Método de Pago:</strong> {{ $facturaArray['metodo_pago'] }}</p>
                <p><strong>Número de pedido:</strong> 12345</p>
                <p>Gracias por su compra.</p>
            </div>
        </div>

        <div class="footer">
            <p>BIENVENIDO A PILATES STUDIO</p>
            <p>Estudio Pilates - Mieres, Asturias | Teléfono: 667667766 | Email: estudioPilates@gmail.com</p>
        </div>
    </div>
</body>

</html>
