@extends('admin/panel-control')

@section('FACTU-productos')
    @if (session()->has('producto'))
        @php
            $productoEditar = session('producto');
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
                                class="container-fluid  overflow-y-auto w-100 h-100  d-flex flex-column justify-content-center align-items-center">
                                <div class="row w-100 h-100 ">
                                    <div class="col">
                                        <div class="row h-100 row-cols-3 ">
                                            <table
                                                class="table tabla-dorada w-100 fs-5 bg-color-fondo-muy-oscuro text-center">
                                                <thead>
                                                    <tr>
                                                        <th class="text-light border border-2 border-fondo">ID</th>
                                                        <th class="text-light border border-2 border-fondo">Nombre</th>
                                                        <th class="text-light border border-2 border-fondo">Descripcion</th>
                                                        <th class="text-light border border-2 border-fondo">Precio</th>
                                                        <th class="text-light border border-2 border-fondo">Nº Clases</th>
                                                        <th class="text-light border border-2 border-fondo">Tiempo Clase
                                                        </th>
                                                        <th class="text-light border border-2 border-fondo">Tiempo validez
                                                        </th>
                                                        <th class="text-light border border-2 border-fondo">Opciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($productos as $producto)
                                                        @if ($producto->type == 'package')
                                                            <tr>
                                                                <td class="texto-color-dorado border border-2 border-fondo">
                                                                    {{ $producto->id }}</td>
                                                                <td class="texto-color-dorado border border-2 border-fondo">
                                                                    {{ $producto->name }}</td>
                                                                <td class="texto-color-dorado border border-2 border-fondo">
                                                                    {{ $producto->description }}</td>
                                                                <td class="texto-color-dorado border border-2 border-fondo">
                                                                    {{ $producto->precio }}</td>
                                                                <td class="texto-color-dorado border border-2 border-fondo">
                                                                    {{ $producto->infoPaquete->numero_clases }}</td>
                                                                <td class="texto-color-dorado border border-2 border-fondo">
                                                                    {{ $producto->infoPaquete->tiempo_clase }}</td>
                                                                <td class="texto-color-dorado border border-2 border-fondo">
                                                                    {{ $producto->infoPaquete->tiempo_validez }}</td>
                                                                <td class="texto-color-dorado border border-2 border-fondo">
                                                                    <div
                                                                        class=" d-flex flex-row justify-content-center align-items-center">
                                                                        <form
                                                                            action="{{ route('productos.edit', $producto->id) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            <input
                                                                                class="texto-color-dorado-claro estilo-formulario"
                                                                                type="submit" value="Editar">
                                                                        </form>
                                                                        <form
                                                                            action="{{ route('productos.destroy', $producto->id) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <input
                                                                                class="texto-color-dorado-claro estilo-formulario"
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
                                class="container-fluid overflow-y-auto w-100 h-100  d-flex flex-column justify-content-center align-items-center">
                                <div class="row w-100 h-100 ">
                                    <div class="col">
                                        <div class="row h-100 row-cols-3 ">
                                            @foreach ($productos as $producto)
                                                @if ($producto->type == 'membership')
                                                    <div data-id="{{ $producto->id }}"
                                                        class="producto-click col text-light d-flex justify-content-center align-items-center ">
                                                        <ul
                                                            class=" h-40 border border-2 border-info p-3 fs-5 d-flex justify-content-center align-items-center flex-column">
                                                            <li class="p-2 text-center text-uppercase">
                                                                {{ $producto->name }}
                                                            </li>
                                                            <li class="p-2 text-center">{{ $producto->description }}</li>
                                                            <li class="p-2 text-center text-danger fs-4">
                                                                {{ $producto->precio }}€</li>
                                                        </ul>
                                                    </div>
                                                    <div id="formulario-producto-{{ $producto->id }}"
                                                        class="d-none col text-light d-flex justify-content-center align-items-center ">
                                                        <div
                                                            class="h-40 border border-2 border-info p-3 fs-5 d-flex justify-content-center align-items-center flex-column">
                                                            <form
                                                                class="w-50 h-100  d-flex justify-content-center align-items-center "
                                                                action="{{ route('productos.edit', ['producto' => $producto->id]) }}"
                                                                method="get">
                                                                @csrf
                                                                <input class="estilo-formulario bg-success" type="submit"
                                                                    value="Editar">
                                                            </form>
                                                            <form
                                                                class="w-50 h-100  d-flex justify-content-center align-items-center "
                                                                action="{{ route('productos.destroy', ['producto' => $producto->id]) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <input class="estilo-formulario bg-danger" type="submit"
                                                                    value="Eliminar">
                                                            </form>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
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
                                            action="{{ session()->has('editable') ? route('productos.update', ['producto' => $productoEditar->id]) : route('productos.store') }}"
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
                                                                value="{{ session()->has('editable') ? $productoEditar->name : '' }}">
                                                            <hr
                                                                class="linea-transition-weigth border border-warning-subtle  border-1 ">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col d-flex flex-column gap-2">
                                                            <textarea id="description" class="estilo-formulario w-100 " placeholder="Escribe aqui una descripcion del producto">
                                                    {{ session()->has('editable') ? $productoEditar->description : '' }}</textarea>
                                                            <hr
                                                                class="linea-transition-weigth border border-warning-subtle  border-1 ">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col d-flex flex-column gap-2">
                                                            <input id="price" type="number"
                                                                class="estilo-formulario w-100 text-center"
                                                                placeholder="Precio del producto" step="0.01"
                                                                value="{{ session()->has('editable') ? $productoEditar->precio : '' }}">
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
                                            <div class="row d-none fs-5" id="seccionSuscripcion">
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
                                                                name="numero_clases_semanal" id="numero_clases_semanal">
                                                            <hr
                                                                class="linea-transition-weigth border border-warning-subtle  border-1 ">
                                                        </div>
                                                        <div class="col">
                                                            <input class="estilo-formulario"
                                                                placeholder="Duracion de las clases" type="number"
                                                                name="tiempo_clase_sus" id="tiempo_clase">
                                                            <hr
                                                                class="linea-transition-weigth border border-warning-subtle  border-1 ">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div
                                                            class="col texto-color-principal d-flex justify-content-center align-items-center gap-3">
                                                            <label class=""
                                                                for="asesoramiento">Asesoramiento:</label>
                                                            <input class="" type="radio" name="asesoramiento"
                                                                value="inicial" id="inicial"><span>Inicio</span>
                                                            <input class="" type="radio" name="asesoramiento"
                                                                value="mensual" id="mensual"><span>Mensual</span>
                                                            <input class="" type="radio" name="asesoramiento"
                                                                value="semanal" id="semanal"><span>Semanal</span>
                                                        </div>
                                                    </div>
                                                    <div class="row p-4">
                                                        <div class="col">
                                                            <input class="estilo-formulario"
                                                                placeholder="Dias para cancelacion" type="number"
                                                                name="dias_cancelacion" id="dias_cancelacion">
                                                            <hr
                                                                class="linea-transition-weigth border border-warning-subtle  border-1 ">
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="beneficios">Beneficios:</label>
                                                                <input type="checkbox" name="beneficios" id="beneficios">
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
                                            <div class="row d-none" id="seccionPaquete">
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
                                                                name="numero_clases_paquete" id="numero_clases_paquete">
                                                            <hr
                                                                class="linea-transition-weigth border border-warning-subtle  border-1 ">
                                                        </div>
                                                        <div class="col">
                                                            <input class="estilo-formulario"
                                                                placeholder="Duracion de las clases" type="number"
                                                                name="tiempo_clase_paq" id="tiempo_clase">
                                                            <hr
                                                                class="linea-transition-weigth border border-warning-subtle  border-1 ">
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div
                                                            class="col texto-color-principal d-flex justify-content-center align-items-center gap-3">
                                                            <label for="descuento">Descuento para proximo
                                                                paquete:</label>
                                                            <input class="estilo-formulario  border-bottom border-dorado"
                                                                type="number" name="descuento" id="descuento">

                                                        </div>
                                                        <div
                                                            class="col texto-color-principal d-flex justify-content-center align-items-center gap-3">
                                                            <label for="validez">Tiempo de validez en dias:</label>
                                                            <input class="estilo-formulario  border-bottom border-dorado"
                                                                type="number" name="validez" id="validez">

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
                        $('#seccionPaquete').removeClass('d-none');
                        $('#seccion-general').addClass('d-none');
                        break;
                    case 'membership':
                        $('#seccionSuscripcion').removeClass('d-none');
                        $('#seccion-general').addClass('d-none');
                }

                var inputName = $('#nombreInput');
                var inputPrice = $('#precioInput');
                var inputDescription = $('#descripcionInput');
                var inputType = $('#tipo_productoInput');

                inputName.val(name);
                inputPrice.val(precio);
                inputDescription.val(description),
                    inputType.val(tipo_producto);



            });
        });
    </script>
@endsection
