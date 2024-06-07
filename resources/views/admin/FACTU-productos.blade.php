@extends('admin/panel-control')

@section('FACTU-productos')
    @if (session()->has('producto'))
        @php
            $productoEditable = session('producto');
        @endphp
    @endif
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
                        <li class="nav-item {{ session()->has('editable') ? 'active' : '' }}" role="presentation">
                            <a class="nav-link {{ session()->has('editable') ? 'active' : '' }}" id="formulario-tab"
                                data-bs-toggle="tab" data-bs-target="#formularioProducto" role="tab"
                                aria-controls="formularioProducto" aria-selected="false" href="">Crear Producto
                                Nuevo</a>
                        </li>
                    </ul>
                </div>
                <div class="row w-100 flex-grow-1 overflow-y-auto   h-auto">
                    <div class="tab-content w-100 h-100" id="tabProductosContent">
                        <div class="tab-pane fade container-fluid w-100 h-100" id="productos-paquetes" role="tabpanel"
                            aria-labelledby="productos-paquetes" tabindex="0">
                            <div
                                class="container-fluid p-2  overflow-y-auto w-100 h-100  d-flex flex-column justify-content-center align-items-center">
                                <div class="row w-100 h-100 ">
                                    <div class="col">
                                        <div class="row h-100 row-cols-3 ">
                                            <table class="table tabla-dorada w-100 fs-5 bg-color-terciario text-center">
                                                <thead>
                                                    <tr>
                                                        <th class="texto-color-resalte border border-2 border-fondo">ID</th>
                                                        <th class="texto-color-resalte border border-2 border-fondo">Nombre
                                                        </th>
                                                        <th class="texto-color-resalte border border-2 border-fondo">
                                                            Descripcion</th>
                                                        <th class="texto-color-resalte border border-2 border-fondo">Precio
                                                        </th>
                                                        <th class="texto-color-resalte border border-2 border-fondo">Nº
                                                            Clases</th>
                                                        <th class="texto-color-resalte border border-2 border-fondo">Tiempo
                                                            Clase
                                                        </th>
                                                        <th class="texto-color-resalte border border-2 border-fondo">Tiempo
                                                            validez
                                                        </th>
                                                        <th class="texto-color-resalte border border-2 border-fondo">
                                                            Opciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($productos as $producto)
                                                        @if ($producto->type == 'package')
                                                            <tr>
                                                                <td
                                                                    class="texto-color-resalte border border-2 border-fondo">
                                                                    {{ $producto->id }}</td>
                                                                <td
                                                                    class="texto-color-resalte border border-2 border-fondo">
                                                                    {{ $producto->name }}</td>
                                                                <td
                                                                    class="texto-color-resalte border border-2 border-fondo">
                                                                    {{ $producto->description }}</td>
                                                                <td
                                                                    class="texto-color-resalte border border-2 border-fondo">
                                                                    {{ $producto->precio }}</td>
                                                                <td
                                                                    class="texto-color-resalte border border-2 border-fondo">
                                                                    {{ $producto->infoPaquete->numero_clases }}</td>
                                                                <td
                                                                    class="texto-color-resalte border border-2 border-fondo">
                                                                    {{ $producto->infoPaquete->tiempo_clase }}</td>
                                                                <td
                                                                    class="texto-color-resalte border border-2 border-fondo">
                                                                    {{ $producto->infoPaquete->tiempo_validez }}</td>

                                                                <td
                                                                    class="texto-color-resalte border border-2 border-fondo">
                                                                    <div
                                                                        class=" d-flex flex-row justify-content-center align-items-center">
                                                                        <form
                                                                            action="{{ route('productos.edit', ['producto' => $producto->id, 'infoPaquete']) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            <input
                                                                                class="texto-color-resalte estilo-formulario"
                                                                                type="submit" value="Editar">
                                                                        </form>
                                                                        <form
                                                                            action="{{ route('productos.destroy', $producto->id) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <input
                                                                                class="texto-color-resalte estilo-formulario"
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
                                <div class="row w-100 h-100 ">
                                    <div class="col">
                                        <div class="row h-100 row-cols-3 ">

                                            <table class="table tabla-dorada w-100 fs-5 bg-color-terciario text-center">
                                                <thead>
                                                    <tr>
                                                        <th class="texto-color-resalte border border-2 border-fondo">ID</th>
                                                        <th class="texto-color-resalte border border-2 border-fondo">Nombre
                                                        </th>
                                                        <th class="texto-color-resalte border border-2 border-fondo">
                                                            Descripcion</th>
                                                        <th class="texto-color-resalte border border-2 border-fondo">Precio
                                                        </th>
                                                        <th class="texto-color-resalte border border-2 border-fondo">Nº
                                                            Clases
                                                            Semanales</th>
                                                        <th class="texto-color-resalte border border-2 border-fondo">Tiempo
                                                            Clase
                                                        </th>
                                                        <th class="texto-color-resalte border border-2 border-fondo">
                                                            Asesoramiento
                                                        </th>
                                                        <th class="texto-color-resalte border border-2 border-fondo">Dias
                                                            Cancelacion
                                                        </th>
                                                        <th class="texto-color-resalte border border-2 border-fondo">
                                                            Beneficios</th>
                                                        <th class="texto-color-resalte border border-2 border-fondo">
                                                            Opciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($productos as $producto)
                                                        @if ($producto->type == 'membership')
                                                            <tr>
                                                                <td
                                                                    class="texto-color-resalte border border-2 border-fondo">
                                                                    {{ $producto->id }}</td>
                                                                <td
                                                                    class="texto-color-resalte border border-2 border-fondo">
                                                                    {{ $producto->name }}</td>
                                                                <td
                                                                    class="texto-color-resalte border border-2 border-fondo">
                                                                    {{ $producto->description }}</td>
                                                                <td
                                                                    class="texto-color-resalte border border-2 border-fondo">
                                                                    {{ $producto->precio }}</td>
                                                                <td
                                                                    class="texto-color-resalte border border-2 border-fondo">
                                                                    {{ $producto->infoSuscripcion->clases_semanales }}</td>
                                                                <td
                                                                    class="texto-color-resalte border border-2 border-fondo">
                                                                    {{ $producto->infoSuscripcion->tiempo_clase }}</td>
                                                                <td
                                                                    class="texto-color-resalte border border-2 border-fondo">
                                                                    {{ $producto->infoSuscripcion->asesoramiento }}</td>
                                                                <td
                                                                    class="texto-color-resalte border border-2 border-fondo">
                                                                    {{ $producto->infoSuscripcion->dias_cancelacion }}</td>
                                                                <td
                                                                    class="texto-color-resalte border border-2 border-fondo">
                                                                    {{ $producto->infoSuscripcion->beneficios }}</td>
                                                                <td
                                                                    class="texto-color-resalte border border-2 border-fondo">
                                                                    <div
                                                                        class=" d-flex flex-row justify-content-center align-items-center">
                                                                        <form
                                                                            action="{{ route('productos.edit', ['producto' => $producto->id, 'infoSuscripcion']) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            <input
                                                                                class="texto-color-resalte estilo-formulario"
                                                                                type="submit" value="Editar">
                                                                        </form>
                                                                        <form
                                                                            action="{{ route('productos.destroy', $producto->id) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <input
                                                                                class="texto-color-resalte estilo-formulario"
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
                        <div class="tab-pane fade container-fluid w-100 h-100 {{ session()->has('editable') ? 'active show' : '' }}"
                            id="formularioProducto" role="tabpanel" aria-labelledby="productos-suscripcion"
                            tabindex="0">
                            <div
                                class="container-fluid w-100 d-flex flex-column justify-content-center align-items-center">
                                <div class="row w-100">
                                    <div class="col p-4">
                                        <form class="formulario w-100 h-100 container-fluid "
                                            action="{{ session()->has('editable') ? route('productos.update', ['producto' => $productoEditable->id]) : route('productos.store') }}"
                                            method="POST">
                                            @csrf
                                            @if (session()->has('editable'))
                                                @method('PUT')
                                            @else
                                                @method('GET')
                                            @endif
                                            <input id="nombreInput" type="hidden" name="name">
                                            <input id="precioInput" type="hidden" name="price">
                                            <input id="descripcionInput" type="hidden" name="description">
                                            <input id="tipo_productoInput" type="hidden" name="type">
                                            <div class="row" id="seccion-general">
                                                <div class="col">
                                                    <div class="row">
                                                        <div class="col d-flex flex-column gap-2">
                                                            <input id="name" type="text"
                                                                class="estilo-formulario w-100 text-center"
                                                                placeholder="Nombre Producto"
                                                                value="{{ session()->has('editable') ? $productoEditable->name : '' }}">
                                                            <hr
                                                                class="linea-transition-weigth border border-warning-subtle  border-1 ">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col d-flex flex-column gap-2">
                                                            <label class="texto-color-secundariotext-center"
                                                                for="descripcion">Descripcion del producto</label>
                                                            <textarea id="description" class="estilo-formulario w-100 texto-color-secundario">
                                                    {{ session()->has('editable') ? $productoEditable->description : '' }}</textarea>
                                                            <hr
                                                                class="linea-transition-weigth border border-warning-subtle  border-1 ">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col d-flex flex-column gap-2">
                                                            <input id="price" type="number"
                                                                class="estilo-formulario w-100 text-center"
                                                                placeholder="Precio del producto" step="0.01"
                                                                value="{{ session()->has('editable') ? $productoEditable->precio : '' }}">
                                                            <hr
                                                                class="linea-transition-weigth border border-warning-subtle  border-1 ">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col d-flex flex-column gap-2">
                                                            <select id="tipo_producto"
                                                                class="estilo-formulario w-100 text-center">
                                                                <option value="#"> --- Selecciona un tipo de producto
                                                                    ---
                                                                </option>
                                                                <option value="membership"
                                                                    {{ session('tipoProducto') == 'membership' ? 'selected' : '' }}>
                                                                    Suscripcion</option>
                                                                <option value="package"
                                                                    {{ session('tipoProducto') == 'package' ? 'selected' : '' }}>
                                                                    Paquete de clases</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row {{ (session()->has('editable') && session('tipoProducto') !== 'membership') || !session()->has('editable') ? 'd-none' : '' }} fs-5"
                                                id="seccionSuscripcion">
                                                <div class="col p-4">
                                                    <div class="row">
                                                        <div class="col">
                                                            <h4
                                                                class="fs-2 text-center p-2 texto-color-secundario text-uppercase">
                                                                Estás editando una Suscripción</h4>

                                                        </div>
                                                    </div>
                                                    <div class="row p-4">
                                                        <div class="col">
                                                            <input class="estilo-formulario"
                                                                placeholder="Numero clases semanales" type="number"
                                                                name="numero_clases_semanal" id="numero_clases_semanal"
                                                                value="{{ session()->has('editable') && session('tipoProducto') == 'membership' ? $productoEditable->infoSuscripcion->clases_semanales : '' }}">
                                                            <hr
                                                                class="linea-transition-weigth border border-warning-subtle  border-1 ">
                                                        </div>
                                                        <div class="col">
                                                            <select class="estilo-formulario-select"
                                                                name="tiempo_clase_sus" id="tiempo_clase">
                                                                <option value="" disabled selected>Duración de las
                                                                    clases</option>
                                                                <option value="45"
                                                                    {{ session()->has('editable') && session('tipoProducto') == 'membership' && $productoEditable->infoSuscripcion->tiempo_clase == 45 ? 'selected' : '' }}>
                                                                    45 minutos</option>
                                                                <option value="60"
                                                                    {{ session()->has('editable') && session('tipoProducto') == 'membership' && $productoEditable->infoSuscripcion->tiempo_clase == 60 ? 'selected' : '' }}>
                                                                    60 minutos</option>
                                                                <option value="120"
                                                                    {{ session()->has('editable') && session('tipoProducto') == 'membership' && $productoEditable->infoSuscripcion->tiempo_clase == 120 ? 'selected' : '' }}>
                                                                    120 minutos</option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div
                                                            class="col texto-color-secundariod-flex justify-content-center align-items-center gap-3">
                                                            <label class=""
                                                                for="asesoramiento">Asesoramiento:</label>
                                                            <input class=""
                                                                {{ session()->has('editable') && session('tipoProducto') == 'membership' && $productoEditable->infoSuscripcion->asesoramiento == 'inicial' ? 'checked' : '' }}
                                                                type="radio" name="asesoramiento" value="inicial"
                                                                id="inicial"><span>Inicio</span>
                                                            <input class=""
                                                                {{ session()->has('editable') && session('tipoProducto') == 'membership' && $productoEditable->infoSuscripcion->asesoramiento == 'mensual' ? 'checked' : '' }}
                                                                type="radio" name="asesoramiento" value="mensual"
                                                                id="mensual"><span>Mensual</span>
                                                            <input class=""
                                                                {{ session()->has('editable') && session('tipoProducto') == 'membership' && $productoEditable->infoSuscripcion->asesoramiento == 'semanal' ? 'checked' : '' }}
                                                                type="radio" name="asesoramiento" value="semanal"
                                                                id="semanal"><span>Semanal</span>
                                                        </div>
                                                    </div>
                                                    <div class="row p-4">
                                                        <div class="col">
                                                            <input class="estilo-formulario"
                                                                placeholder="Dias para cancelacion" type="number"
                                                                name="dias_cancelacion" id="dias_cancelacion"
                                                                value="{{ session()->has('editable') && session('tipoProducto') == 'membership' ? $productoEditable->infoSuscripcion->dias_cancelacion : '' }}">
                                                            <hr
                                                                class="linea-transition-weigth border border-warning-subtle  border-1 ">
                                                        </div>
                                                        <div class="row">
                                                            <div class="col texto-color-principal">
                                                                <label class="" for="beneficios">Beneficios:</label>
                                                                <input type="radio" name="beneficios" id="beneficios"
                                                                    {{ session()->has('editable') && session('tipoProducto') == 'membership' && $productoEditable->infoSuscripcion->beneficios == '1' ? 'checked' : '' }}
                                                                    value="true">Sí
                                                                <input type="radio" name="beneficios" id="beneficios"
                                                                    {{ session()->has('editable') && session('tipoProducto') == 'membership' && $productoEditable->infoSuscripcion->beneficios == '0' ? 'checked' : '' }}
                                                                    value="false" checked>No

                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <input class="estilo-formulario estilo-formulario-enviar"
                                                                    type="submit" value="Crear Producto">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row {{ (session()->has('editable') && session('tipoProducto') !== 'package') || !session()->has('editable') ? 'd-none' : '' }}"
                                                id="seccionPaquete">
                                                <div class="col p-4">
                                                    <div class="row">
                                                        <div class="col">
                                                            <h4
                                                                class="fs-2 text-center p-2 texto-color-secundario text-uppercase">
                                                                Estás editando un Paquete de clases</h4>
                                                        </div>
                                                    </div>
                                                    <div class="row p-4">
                                                        <div class="col">
                                                            <input class="estilo-formulario"
                                                                placeholder="Numero clases paquete" type="number"
                                                                name="numero_clases_paquete" id="numero_clases_paquete"
                                                                value="{{ session()->has('editable') && session('tipoProducto') == 'package' ? $productoEditable->infoPaquete->numero_clases : '' }}">
                                                            <hr
                                                                class="linea-transition-weigth border border-warning-subtle  border-1 ">
                                                        </div>
                                                        <div class="col">
                                                            <select class="estilo-formulario-select"
                                                                name="tiempo_clase_paq" id="tiempo_clase">
                                                                <option value="" disabled selected>Duración de las
                                                                    clases</option>
                                                                <option value="45"
                                                                    {{ session()->has('editable') && session('tipoProducto') == 'package' && $productoEditable->infoPaquete->tiempo_clase == 45 ? 'selected' : '' }}>
                                                                    45 minutos</option>
                                                                <option value="60"
                                                                    {{ session()->has('editable') && session('tipoProducto') == 'package' && $productoEditable->infoPaquete->tiempo_clase == 60 ? 'selected' : '' }}>
                                                                    60 minutos</option>
                                                                <option value="120"
                                                                    {{ session()->has('editable') && session('tipoProducto') == 'package' && $productoEditable->infoPaquete->tiempo_clase == 120 ? 'selected' : '' }}>
                                                                    120 minutos</option>
                                                            </select>

                                                        </div>

                                                    </div>

                                                    <div class="row">
                                                        <div
                                                            class="col texto-color-secundariod-flex justify-content-center align-items-center gap-3">
                                                            <label for="validez">Tiempo de validez en dias:</label>
                                                            <input class="estilo-formulario  border-bottom border-dorado"
                                                                type="number" name="validez" id="validez"
                                                                value="{{ session()->has('editable') && session('tipoProducto') == 'package' ? $productoEditable->infoPaquete->tiempo_validez : '' }}"">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <input class="estilo-formulario estilo-formulario-enviar"
                                                                type="submit" value="Crear Producto">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </form>
                                    </div>
                                </div>
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
