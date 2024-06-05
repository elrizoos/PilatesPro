<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Factura</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            width: 100%;
            color: #333;
            background-color: #f7f7f7;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header,
        .footer {
            text-align: center;
            margin-bottom: 20px;
        }

        .header img {
            width: 150px;
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

        .client-vendor-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .client-info,
        .vendor-info {
            width: 45%;
        }

        .invoice-details {
            text-align: right;
        }

        .invoice-details th,
        .invoice-details td {
            padding: 5px;
        }

        .invoice-details th {
            text-align: left;
        }

        h2 {
            background-color: #ffcc00;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
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
            text-align: center;
        }

        .summary-table th,
        .summary-table td {
            border: none;
            padding: 5px 10px;
        }

        .summary-table {
            text-align: right;
        }

        .summary-table th {
            text-align: left;
        }

        .footer p {
            font-size: 14px;
            color: #555;
        }

        .welcome-message {
            text-align: center;
            margin-top: 50px;
            color: #ff0000;
            font-size: 18px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="{{ asset('imagenes/logo.png') }}" alt="Logo Pilates">
        </div>

        <div class="client-vendor-info">
            <div class="vendor-info">
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

            <div class="client-info">
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

        <div class="invoice-details">
            <table>
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

        <div>
            <p><strong>Método de Pago:</strong> {{ $facturaArray['metodo_pago'] }}</p>
            <p><strong>Número de pedido:</strong> 12345</p>
            <p>Gracias por su compra.</p>
        </div>

        <div class="welcome-message">
            <p>BIENVENIDO A PILATES STUDIO</p>
        </div>

        <div class="footer">
            <p>Estudio Pilates - Mieres, Asturias | Teléfono: 667667766 | Email: estudioPilates@gmail.com</p>
        </div>
    </div>
</body>

</html>
