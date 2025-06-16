@extends('admin/panel-control')

@section('FACTU-productos')
    <div class="container-fluid  w-100 h-100">
        <div class="row h-100">
            <div class="col h-100 d-flex justify-content-center align-items-center flex-column">
                <div class="row">
                    <ul class="nav nav-tabs" id="tabProductos" role="tablist">
                        <li class="nav-item " role="presentation">
                            <a class="nav-link " href="" id="paquetes-tab" data-bs-toggle="tab"
                                data-bs-target="#productos-paquetes" role="tab" aria-controls="productos-paquetes"
                                aria-selected="false">Paquetes de clases</a>
                        </li>
                        <li class="nav-item " role="presentation">
                            <a class="nav-link" href="" id="suscripcion-tab" data-bs-toggle="tab"
                                data-bs-target="#productos-suscripcion" role="tab" aria-controls="productos-suscripcion"
                                aria-selected="false">Suscripciones</a>
                        </li>
                        <li class="nav-item {{ isset($producto) ? 'active' : '' }}" role="presentation">
                            <a class="nav-link" href="javascript:void(0)" id="formulario-tab" data-bs-toggle="tab"
                                data-bs-target="#formularioProducto" role="tab" aria-controls="formularioProducto"
                                aria-selected="false">
                                {{ isset($producto) ? 'Editar Producto' : 'Crear Producto Nuevo' }}
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="row w-100 flex-grow-1 overflow-y-auto   h-auto">
                    <div class="tab-content w-100 h-100" id="tabProductosContent">
                        <div class="tab-pane fade container-fluid w-100 h-100" id="productos-paquetes" role="tabpanel"
                            aria-labelledby="productos-paquetes" tabindex="0">
                            <div
                                class="container-fluid p-2  overflow-y-auto w-100 h-100  d-flex flex-column justify-content-center align-items-center">
                                <div class="row h-100 ">
                                    <div class="col">
                                        <div class="row h-100 row-cols-3 ">
                                            <table class="table tabla-dorada w-100 fs-5 bg-color-terciario text-center">
                                                <thead>
                                                    <tr>
                                                        <th class="texto-color-dorado border border-1 border-fondo">ID</th>
                                                        <th class="texto-color-dorado border border-1 border-fondo">Nombre
                                                        </th>
                                                        <th class="texto-color-dorado border border-1 border-fondo">
                                                            Descripcion</th>
                                                        <th class="texto-color-dorado border border-1 border-fondo">Precio
                                                        </th>
                                                        <th class="texto-color-dorado border border-1 border-fondo">Nº
                                                            Clases</th>
                                                        <th class="texto-color-dorado border border-1 border-fondo">Tiempo
                                                            Clase
                                                        </th>
                                                        <th class="texto-color-dorado border border-1 border-fondo">Tiempo
                                                            validez
                                                        </th>
                                                        <th class="texto-color-dorado border border-1 border-fondo">
                                                            Opciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($productos as $product)
                                                        @if ($product->type == 'package')
                                                            <tr>
                                                                <td
                                                                    class="texto-color-dorado border border-1 border-fondo">
                                                                    {{ $product->id }}</td>
                                                                <td
                                                                    class="texto-color-dorado border border-1 border-fondo">
                                                                    {{ $product->name }}</td>
                                                                <td
                                                                    class="texto-color-dorado border border-1 border-fondo">
                                                                    {{ $product->description }}</td>
                                                                <td
                                                                    class="texto-color-dorado border border-1 border-fondo">
                                                                    {{ $product->precio }}</td>
                                                                <td
                                                                    class="texto-color-dorado border border-1 border-fondo">
                                                                    {{ isset($product->infoPaquete->numero_clases) ? $product->infoPaquete->numero_clases : '' }}
                                                                </td>
                                                                <td
                                                                    class="texto-color-dorado border border-1 border-fondo">
                                                                    {{ isset($product->infoPaquete->tiempo_clase) ? $product->infoPaquete->tiempo_clase : '' }}
                                                                </td>
                                                                <td
                                                                    class="texto-color-dorado border border-1 border-fondo">
                                                                    {{ isset($product->infoPaquete->tiempo_validez) ? $product->infoPaquete->tiempo_validez : '' }}
                                                                </td>

                                                                <td
                                                                    class="texto-color-dorado border border-1 border-fondo">
                                                                    <div
                                                                        class=" d-flex flex-row justify-content-center align-items-center gap-1">
                                                                        <form
                                                                            action="{{ route('productos.edit', ['producto' => $product->id, 'infoPaquete']) }}"
                                                                            method="GET">
                                                                            @csrf
                                                                            <input
                                                                                class="texto-color-resalte estilo-formulario p-2"
                                                                                type="submit" value="Editar">
                                                                        </form>
                                                                        <form
                                                                            action="{{ route('productos.destroy', $product->id) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <input id="input-eliminar"
                                                                                class="p-2 texto-color-resalte estilo-formulario"
                                                                                type="submit" value="Eliminar">
                                                                        </form>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade container-fluid w-100 h-100" id="productos-suscripcion" role="tabpanel"
                            aria-labelledby="productos-suscripcion" tabindex="0">
                            <div
                                class="container-fluid p-2 overflow-y-auto w-100 h-100  d-flex flex-column justify-content-center align-items-center">
                                <div class="row h-100 ">
                                    <div class="col">
                                        <div class="row h-100 row-cols-3 ">

                                            <table class="table tabla-dorada w-100 fs-5 bg-color-terciario text-center">
                                                <thead>
                                                    <tr>
                                                        <th class="texto-color-dorado border border-1 border-fondo">ID</th>
                                                        <th class="texto-color-dorado border border-1 border-fondo">Nombre
                                                        </th>
                                                        <th class="texto-color-dorado border border-1 border-fondo">
                                                            Descripcion</th>
                                                        <th class="texto-color-dorado border border-1 border-fondo">Precio
                                                        </th>
                                                        <th class="texto-color-dorado border border-1 border-fondo">Nº
                                                            Clases
                                                            Semanales</th>
                                                        <th class="texto-color-dorado border border-1 border-fondo">Tiempo
                                                            Clase
                                                        </th>
                                                        <th class="texto-color-dorado border border-1 border-fondo">
                                                            Asesoramiento
                                                        </th>
                                                        <th class="texto-color-dorado border border-1 border-fondo">Dias
                                                            Cancelacion
                                                        </th>
                                                        <th class="texto-color-dorado border border-1 border-fondo">
                                                            Beneficios</th>
                                                        <th class="texto-color-dorado border border-1 border-fondo">
                                                            Opciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($productos as $product)
                                                        @if ($product->type == 'membership')
                                                            <tr>
                                                                <td
                                                                    class="texto-color-dorado border border-1 border-fondo">
                                                                    {{ $product->id }}</td>
                                                                <td
                                                                    class="texto-color-dorado border border-1 border-fondo">
                                                                    {{ $product->name }}</td>
                                                                <td
                                                                    class="texto-color-dorado border border-1 border-fondo">
                                                                    {{ $product->description }}</td>
                                                                <td
                                                                    class="texto-color-dorado border border-1 border-fondo">
                                                                    {{ $product->precio }}</td>
                                                                <td
                                                                    class="texto-color-dorado border border-1 border-fondo">
                                                                    {{ isset($product->infoSuscripcion->clases_semanales) ? $product->infoSuscripcion->clases_semanales : '' }}
                                                                </td>
                                                                <td
                                                                    class="texto-color-dorado border border-1 border-fondo">
                                                                    {{ isset($product->infoSuscripcion->tiempo_clase) ? $product->infoSuscripcion->tiempo_clase : '' }}
                                                                </td>
                                                                <td
                                                                    class="texto-color-dorado border border-1 border-fondo">
                                                                    {{ isset($product->infoSuscripcion->asesoramiento) ? $product->infoSuscripcion->asesoramiento : '' }}
                                                                </td>
                                                                <td
                                                                    class="texto-color-dorado border border-1 border-fondo">
                                                                    {{ isset($product->infoSuscripcion->dias_cancelacion) ? $product->infoSuscripcion->dias_cancelacion : '' }}
                                                                </td>
                                                                <td
                                                                    class="texto-color-dorado border border-1 border-fondo">
                                                                    {{ isset($product->infoSuscripcion->beneficio) ? $product->infoSuscripcion->beneficio : '' }}
                                                                </td>
                                                                <td
                                                                    class="texto-color-dorado border border-1 border-fondo">
                                                                    <div
                                                                        class=" d-flex flex-row justify-content-center align-items-center gap-1">
                                                                        <form
                                                                            action="{{ route('productos.edit', ['producto' => $product->id, 'infoSuscripcion']) }}"
                                                                            method="GET">
                                                                            @csrf
                                                                            <input
                                                                                class="p-2 texto-color-resalte estilo-formulario"
                                                                                type="submit" value="Editar">
                                                                        </form>
                                                                        <form
                                                                            action="{{ route('productos.destroy', $product->id) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <input id="input-eliminar"
                                                                                class=" p-2 texto-color-resalte estilo-formulario"
                                                                                type="submit" value="Eliminar">
                                                                        </form>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade container-fluid w-100 h-100 {{ isset($producto) ? 'active show' : '' }}"
                            id="formularioProducto" role="tabpanel" aria-labelledby="productos-suscripcion"
                            tabindex="0">
                            <div class="contenedor-formulario-producto">
                                <form id="formulario-creacion-producto"
                                    action="{{ isset($producto) ? route('productos.update', ['producto' => $producto->id]) : route('productos.store') }}"
                                    method="POST">
                                    @csrf

                                    @if (isset($producto))
                                        @method('PUT')
                                    @endif
                                    <input id="nombreInput" type="hidden" name="name">
                                    <input id="precioInput" type="hidden" name="price">
                                    <input id="descripcionInput" type="hidden" name="description">
                                    <input id="tipo_productoInput" type="hidden" name="type">
                                    <div class="row">
                                        <div class="form-group">
                                            <label for="nombre">Nombre Producto:</label>
                                            <input type="text" name="name" id="name"
                                                value="{{ isset($producto) ? $producto->name : '' }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="descripcion">Descripcion Producto:</label>
                                            <input type="text" name="description" id="description"
                                                value="{{ isset($producto) ? $producto->description : '' }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <label for="precio">Precio Producto:</label>
                                            <input type="text" name="price" id="price"
                                                value="{{ isset($producto) ? $producto->precio : '' }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="tipo_producto">Tipo Producto:</label>
                                            <select id="tipo_producto" name="type">
                                                <option value="#"> --- Selecciona un tipo de producto
                                                    ---
                                                </option>
                                                <option value="membership"
                                                    {{ isset($tipoProducto) && $tipoProducto == 'membership' ? 'selected' : '' }}>
                                                    Suscripcion</option>
                                                <option value="package"
                                                    {{ isset($tipoProducto) && $tipoProducto == 'package' ? 'selected' : '' }}>
                                                    Paquete de clases</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row contenedor-membership {{ !isset($producto) || !isset($tipoProducto) || $tipoProducto !== 'membership' ? 'd-none' : '' }} fs-5"
                                        id="seccionSuscripcion">
                                        <h3>Estas editando una suscripción</h3>
                                        <div class="row">
                                            <div class="form-group">
                                                <label for="numero_clases_semanal">Numero de clases semanales:</label>
                                                <input type="number" name="numero_clases_semanal"
                                                    id="numero_clases_semanal"
                                                    value="{{ isset($producto) && isset($tipoProducto) && $tipoProducto == 'membership' ? $producto->infoSuscripcion->clases_semanales : '' }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="tiempo_clase_sus">Tiempo de cada clase:</label>
                                                <select name="tiempo_clase_sus" id="tiempo_clase">
                                                    <option value="" disabled selected>Duración de las
                                                        clases</option>
                                                    <option value="45"
                                                        {{ isset($producto) && isset($tipoProducto) && $tipoProducto == 'membership' && $producto->infoSuscripcion->tiempo_clase == 45 ? 'selected' : '' }}>
                                                        45 minutos</option>
                                                    <option value="60"
                                                        {{ isset($producto) && isset($tipoProducto) && $tipoProducto == 'membership' && $producto->infoSuscripcion->tiempo_clase == 60 ? 'selected' : '' }}>
                                                        60 minutos</option>
                                                    <option value="120"
                                                        {{ isset($producto) && isset($tipoProducto) && $tipoProducto == 'membership' && $producto->infoSuscripcion->tiempo_clase == 120 ? 'selected' : '' }}>
                                                        120 minutos</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row tres-columnas">
                                            <div class="form-group">
                                                <label class="" for="asesoramiento">Asesoramiento:</label>
                                                <input class=""
                                                    {{ isset($producto) && isset($tipoProducto) && $tipoProducto == 'membership' && $producto->infoSuscripcion->asesoramiento == 'inicial' ? 'checked' : '' }}
                                                    type="radio" name="asesoramiento" value="inicial"
                                                    id="inicial"><span>Inicio</span>
                                                <input class=""
                                                    {{ isset($producto) && isset($tipoProducto) && $tipoProducto == 'membership' && $producto->infoSuscripcion->asesoramiento == 'mensual' ? 'checked' : '' }}
                                                    type="radio" name="asesoramiento" value="mensual"
                                                    id="mensual"><span>Mensual</span>
                                                <input class=""
                                                    {{ isset($producto) && isset($tipoProducto) && $tipoProducto == 'membership' && $producto->infoSuscripcion->asesoramiento == 'semanal' ? 'checked' : '' }}
                                                    type="radio" name="asesoramiento" value="semanal"
                                                    id="semanal"><span>Semanal</span>
                                            </div>
                                            <div class="form-group">
                                                <label for="dias_cancelacion">Dias de cancelación:</label>
                                                <input type="number" name="dias_cancelacion" id="dias_cancelacion"
                                                    value="{{ isset($producto) && isset($tipoProducto) && $tipoProducto == 'membership' ? $producto->infoSuscripcion->dias_cancelacion : '' }}">
                                            </div>
                                            <div class="form-group">
                                                <label class="" for="beneficios">Beneficios:</label>
                                                <input type="radio" name="beneficios" id="beneficios"
                                                    {{ isset($producto) && isset($tipoProducto) && $tipoProducto == 'membership' && $producto->infoSuscripcion->beneficios == '1' ? 'checked' : '' }}
                                                    value="true">Sí
                                                <input type="radio" name="beneficios" id="beneficios"
                                                    {{ isset($producto) && isset($tipoProducto) && $tipoProducto == 'membership' && $producto->infoSuscripcion->beneficios == '0' ? 'checked' : '' }}
                                                    value="false" checked>No

                                            </div>
                                        </div>
                                        <div class="row">
                                            <input class="" type="submit"
                                                value="{{ isset($producto) ? 'Actualizar Producto' : 'Crear Producto' }}">
                                        </div>
                                    </div>
                                    <div class="row contenedor-paquete {{ !isset($producto) || !isset($tipoProducto) || $tipoProducto !== 'package' ? 'd-none' : '' }} fs-5"
                                        id="seccionPaquete">
                                        <h3>Estas editando un paquete</h3>
                                        <div class="row">
                                            <div class="form-group">
                                                <label for="numero_clases_paquete">Numero clases:</label>
                                                <input type="number" name="numero_clases_paquete"
                                                    id="numero_clases_paquete"
                                                    value="{{ isset($producto) && isset($tipoProducto) && $tipoProducto == 'package' ? $producto->infoPaquete->numero_clases : '' }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="tiempo_clase">Tiempo de clase:</label>
                                                <select name="tiempo_clase_paq" id="tiempo_clase">
                                                    <option value="" disabled selected>Duración de las
                                                        clases</option>
                                                    <option value="45"
                                                        {{ isset($producto) && isset($tipoProducto) && $tipoProducto == 'package' && $producto->infoPaquete->tiempo_clase == 45 ? 'selected' : '' }}>
                                                        45 minutos</option>
                                                    <option value="60"
                                                        {{ isset($producto) && isset($tipoProducto) && $tipoProducto == 'package' && $producto->infoPaquete->tiempo_clase == 60 ? 'selected' : '' }}>
                                                        60 minutos</option>
                                                    <option value="120"
                                                        {{ isset($producto) && isset($tipoProducto) && $tipoProducto == 'package' && $producto->infoPaquete->tiempo_clase == 120 ? 'selected' : '' }}>
                                                        120 minutos</option>
                                                </select>

                                            </div>
                                            <div class="form-group">
                                                <label for="validez">Tiempo de validez de clases:</label>
                                                <input type="number" name="validez" id="validez"
                                                    value="{{ isset($producto) && isset($tipoProducto) && $tipoProducto == 'package' ? $producto->infoPaquete->tiempo_validez : '' }}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <input class="" type="submit"
                                                value="{{ isset($producto) ? 'Actualizar Producto' : 'Crear Producto' }}">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="position-absolute text-danger top-0 m-3 fs-4 text-uppercase d-none" id="botonAtrasFormulario">
            Atras
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.producto-click').on('click', function() {
                idProducto = $(this).data('id');
                $('#formulario-producto-' + idProducto).removeClass('d-none').addClass('d-flex');
                $(this).removeClass('d-flex').addClass('d-none');
            });

            $('#tipo_producto').change(function() {
                var name = $('#name').val();
                var description = $('#description').val();
                var tipo_producto = $(this).val();
                var precio = $('#price').val();

                switch (tipo_producto) {
                    case 'package':
                        console.log('HOLA');
                        $('#seccionSuscripcion').removeClass('d-none');
                        $('#seccionSuscripcion').addClass('d-none');
                        $('#seccionPaquete').removeClass('d-none');
                        $('#botonAtrasFormulario').removeClass('d-none');
                        $('#botonAtrasFormulario').on('click', function() {
                            $('#botonAtrasFormulario').addClass('d-none');
                            $('#seccionPaquete').addClass('d-none');
                            $('#seccion-general').removeClass('d-none');
                        });
                        break;
                    case 'membership':
                        $('#seccionPaquete').removeClass('d-none');
                        $('#seccionPaquete').addClass('d-none');
                        $('#seccionSuscripcion').removeClass('d-none');
                        $('#botonAtrasFormulario').removeClass('d-none');
                        $('#botonAtrasFormulario').on('click', function() {
                            $('#seccionSuscripcion').addClass('d-none');
                            $('#botonAtrasFormulario').addClass('d-none');
                            $('#seccion-general').removeClass('d-none');
                        });
                        break;
                }

                $('#nombreInput').val(name);
                $('#precioInput').val(precio);
                $('#descripcionInput').val(description);
                $('#tipo_productoInput').val(tipo_producto);



            });
        });
    </script>
@endsection
