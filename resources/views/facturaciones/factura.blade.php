<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>facturaArray</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            color: black;
        }

        .container {
            width: 100%;
            margin: 0 auto;
            padding: 20px;
        }

        .contenedor-header {
            display: table;
            width: 100%;
        }

        .header,
        .footer {
            text-align: center;
        }

        .header {
            display: table-cell;
            width: 30%;
            position: relative;
        }

        .header img {
            width: 77%;
            position: absolute;
            top: 0;
            left: 0;
        }

        td {
            text-align: left;
        }

        td span {
            color: black;
            font-weight: bold;
        }

        .details,
        .client-info,
        .vendor-info {
            margin: 20px 0;
        }

        .details th,
        .details td,
        .client-info th,
        .client-info td,
        .vendor-info th,
        .vendor-info td {
            padding: 5px;
            border-bottom: 1px solid #ddd;
        }

        .cliente-facturaArray {
            width: 100%;
            display: table;
            margin-top: 20px;
        }

        .client-info,
        .vendor-info {
            display: table-cell;
            width: 50%;
        }

        .details {
            width: 100%;
            border-collapse: collapse;
        }

        .footer {
            margin-top: 30px;
            font-size: 14px;
            color: #555;
        }

        .bienvenido {
            text-align: center;
            margin-top: 50px;
            color: red;
            font-size: 18px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .no-border th,
        .no-border td {
            border: none;
        }
    </style>
</head>

<body>
    <div>
        <div>
            <div>
                <img src="{{ asset('imagenes/logo.png') }}" alt="Logo Pilates">
            </div>

            <div>
                <table>
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
        </div>

        <div>
            <div>
                <table>
                    <tr>
                        <th>CLIENTE</th>
                    </tr>
                    <tr>
                        <td><span>Nombre del cliente:</span> {{ $cliente['nombre'] }} {{ $cliente['apellidos'] }}</td>
                    </tr>
                    <tr>
                        <td><span>Apellidos del cliente:</span> {{ $cliente['apellidos'] }}</td>
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
            <div>
                <table>
                    <tr>
                        <th>facturaArray Nº</th>
                        <td>#001</td>
                    </tr>
                    <tr>
                        <th>Fecha de emisión</th>
                        <td>dd/mm/yyyy</td>
                    </tr>
                    <tr>
                        <th>Fecha de vencimiento</th>
                        <td>dd/mm/yyyy</td>
                    </tr>
                </table>
            </div>
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

        <div>
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
            <p><strong>Método de Pago:</strong> Tarjeta de crédito</p>
            <p><strong>Número de pedido:</strong> 12345</p>
            <p>Gracias por su compra.</p>
        </div>

        <div>
            <p>BIENVENIDO A PILATES STUDIO</p>
        </div>
    </div>
</body>

</html>
