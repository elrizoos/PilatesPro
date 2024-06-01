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
                    <ul class="nav nav-tabs" id="tabImagenes" role="tablist">
                        <li class="nav-item " role="presentation">
                            <a class="nav-link " href="" id="perfil-tab" data-bs-toggle="tab"
                                data-bs-target="#imagenes-perfil" role="tab" aria-controls="imagenes-perfil"
                                aria-selected="false">Paquetes de clases</a>
                        </li>
                        <li class="nav-item " role="presentation">
                            <a class="nav-link" href="" id="seccion-tab" data-bs-toggle="tab"
                                data-bs-target="#imagenes-seccion" role="tab" aria-controls="imagenes-seccion"
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
                    <div class="tab-content w-100 h-100" id="tabImagenesContent">
                        <div class="tab-pane fade container-fluid w-100 h-100" id="imagenes-perfil" role="tabpanel"
                            aria-labelledby="imagenes-perfil" tabindex="0">
                            <div
                                class="container-fluid  overflow-y-auto w-100 h-100  d-flex flex-column justify-content-center align-items-center">
                                <div class="row w-100 h-100 ">
                                    <div class="col">
                                        <div class="row h-100 row-cols-3 ">
                                            @foreach ($productos as $producto)
                                                @if ($producto->type == 'package')
                                                    <div data-id="{{ $producto->id }}"
                                                        class="producto-click col text-light  d-flex justify-content-center align-items-center ">
                                                        <ul
                                                            class=" h-40 border border-2 border-info p-3 fs-5 d-flex justify-content-center align-items-center flex-column">
                                                            <li class="p-2 text-center text-uppercase">{{ $producto->name }}
                                                            </li>
                                                            <li class="p-2 text-center">{{ $producto->description }}</li>
                                                            <li class="p-2 text-center">{{ $producto->quantity }} clases</li>
                                                            <li class="p-2 text-center text-danger fs-4">
                                                                {{ $producto->precio }}€</li>
                                                        </ul>
                                                    </div>
                                                    <div id="formulario-producto-{{ $producto->id }}"
                                                        class="d-none col text-light d-flex justify-content-center align-items-center }">
                                                        <div
                                                            class="h-40 border border-2 border-info p-3 fs-5 d-flex justify-content-center align-items-center flex-column">
                                                            <form
                                                                class="w-50 h-100  d-flex justify-content-center align-items-center "
                                                                action="{{ route('productos.edit', ['producto' => $producto->id]) }}">
                                                                <input class="estilo-formulario bg-success" type="submit"
                                                                    value="Editar">
                                                            </form>
                                                            <form
                                                                class="w-50 h-100  d-flex justify-content-center align-items-center "
                                                                action="{{ route('productos.destroy', ['producto' => $producto->id]) }}">
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
                        <div class="tab-pane fade container-fluid w-100 h-100" id="imagenes-seccion" role="tabpanel"
                            aria-labelledby="imagenes-seccion" tabindex="0">
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
                                                                action="{{ route('productos.edit', ['producto' => $producto->id]) }}" method="get">
                                                                @csrf
                                                                <input class="estilo-formulario bg-success" type="submit"
                                                                    value="Editar">
                                                            </form>
                                                            <form
                                                                class="w-50 h-100  d-flex justify-content-center align-items-center "
                                                                action="{{ route('productos.destroy', ['producto' => $producto->id]) }}" method="post">
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
                            id="formularioProducto" role="tabpanel" aria-labelledby="imagenes-seccion" tabindex="0">
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
                                            <div class="row">
                                                <div class="col d-flex flex-column gap-2">
                                                    <input type="text" name="name"
                                                        class="estilo-formulario w-100 text-center"
                                                        placeholder="Nombre Producto" required
                                                        value="{{ session()->has('editable') ? $productoEditar->name : '' }}">
                                                    <hr
                                                        class="linea-transition-weigth border border-warning-subtle  border-1 ">

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col d-flex flex-column gap-2">
                                                    <textarea name="description" class="estilo-formulario w-100 "
                                                        placeholder="Escribe aqui una descripcion del producto">
                                                    {{ session()->has('editable') ? $productoEditar->description : '' }}</textarea>
                                                    <hr
                                                        class="linea-transition-weigth border border-warning-subtle  border-1 ">

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col d-flex flex-column gap-2">
                                                    <select name="type" class="estilo-formulario w-100 text-center"
                                                        placeholder="" required>
                                                        <option value="#"> --- Selecciona un tipo de producto ---
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
                                            <div class="row">
                                                <div class="col d-flex flex-column gap-2">
                                                    <input type="number" name="price"
                                                        class="estilo-formulario w-100 text-center"
                                                        placeholder="Precio del producto" step="0.01" required
                                                        value="{{ session()->has('editable') ? $productoEditar->precio : '' }}">
                                                    <hr
                                                        class="linea-transition-weigth border border-warning-subtle  border-1 ">

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col d-flex flex-column gap-2">
                                                    <input type="number" name="quantity"
                                                        class="estilo-formulario w-100 text-center"
                                                        placeholder="Cantidad de clases en el paquete"
                                                        value="{{ session()->has('editable') ? $productoEditar->quantity : '' }}">
                                                    <hr
                                                        class="linea-transition-weigth border border-warning-subtle  border-1 ">

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <input class="estilo-formulario estilo-formulario-enviar"
                                                        type="submit" value="Crear Producto">
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
        });
    </script>
@endsection
