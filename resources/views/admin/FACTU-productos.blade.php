@extends('admin/panel-control')

@section('FACTU-productos')
    @if (!isset($edicion))
        {{ $edicion = '' }}
    @endif
    @if (!isset($editable))
        {{ $editable = '' }}
    @endif
    <div class="container-fluid  w-100 h-100">
        <div class="row h-100">
            <div class="col h-100 d-flex justify-content-center align-items-center flex-column">
                <div class="row">
                    <ul class="nav nav-tabs" id="tabImagenes" role="tablist">
                        <li class="nav-item {{ $edicion === 'paquete' ? 'active' : '' }}" role="presentation">
                            <a class="nav-link {{ $edicion === 'paquete' ? 'active' : '' }}" href="" id="perfil-tab"
                                data-bs-toggle="tab" data-bs-target="#imagenes-perfil" role="tab"
                                aria-controls="imagenes-perfil" aria-selected="false">Paquetes de clases</a>
                        </li>
                        <li class="nav-item {{ $edicion === 'suscripcion' ? 'active' : '' }}" role="presentation">
                            <a class="nav-link {{ $edicion === 'suscripcion' ? 'active' : '' }}" href=""
                                id="seccion-tab" data-bs-toggle="tab" data-bs-target="#imagenes-seccion" role="tab"
                                aria-controls="imagenes-seccion" aria-selected="false">Suscripciones</a>
                        </li>
                    </ul>
                </div>
                <div class="row flex-grow-1 overflow-y-auto   h-auto">
                    <div class="tab-content w-100 h-100" id="tabImagenesContent">
                        <div class="tab-pane fade container-fluid w-100 h-100 {{ $edicion === 'paquete' ? 'active show' : '' }}"
                            id="imagenes-perfil" role="tabpanel" aria-labelledby="imagenes-perfil" tabindex="0">
                            <div
                                class="container-fluid w-100  d-flex flex-column justify-content-center align-items-center">
                                <div class="row">
                                    <div class="col p-4">
                                        <form class="container-fluid" action="{{ route('clasePaquete.store') }}"
                                            method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col d-flex gap-2">
                                                    <div class="row">
                                                        <div class="col">
                                                            <input class="estilo-formulario" type="text"
                                                                name="numero_clases" placeholder="Numero de clases">
                                                            <hr
                                                                class="linea-transition-weigth border border-warning-subtle  border-1 ">
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col">
                                                            <input class="estilo-formulario" type="number" name="precio"
                                                                placeholder="Precio">
                                                            <hr
                                                                class="linea-transition-weigth border border-warning-subtle  border-1 ">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <input class="estilo-formulario" type="text" name="nombre"
                                                                placeholder="Nombre paquete">
                                                            <hr
                                                                class="linea-transition-weigth border border-warning-subtle  border-1 ">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <input class="estilo-formulario estilo-formulario-enviar" type="submit"
                                                        value="Crear Paquete de clases">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="row flex-grow-1">
                                    <div class="col">
                                        <div class="row row-cols-3">
                                            @foreach ($datos as $dato)
                                                <div class="col pt-2 pb-2" id="{{ $dato['paquete']->id }}">
                                                    @if (isset($editable) && $edicion == 'paquete' && $dato['paquete']->id == $editable)
                                                        <form
                                                            class="col  bg-color-fondo-muy-oscuro border border-2 border-light"
                                                            action="{{ route('clasePaquete.update', $dato['paquete']->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <input class="estilo-formulario" type="text"
                                                                name="nombre_editable"
                                                                value="{{ old('nombre-editable', $dato['producto']->name) }}">
                                                            <input class="estilo-formulario" type="number"
                                                                name="numero_clases_editable"
                                                                value="{{ old('numero_clases_editable', $dato['paquete']->numero_clases) }}">
                                                            <input class="estilo-formulario" type="text"
                                                                name="precio_editable"
                                                                value="{{ old('precio-editable', $dato['paquete']->precio) }}">
                                                            <input class="estilo-formulario estilo-formulario-enviar"
                                                                type="submit" value="Editar Paquete">
                                                        </form>
                                                        <form action="{{ route('productos') }}" method="GET">
                                                            <input type="submit" value="Cancelar"
                                                                class="estilo-formulario estilo-formulario-enviar text-danger-emphasis">

                                                        </form>
                                                    @else
                                                        <div
                                                            class="col bg-color-fondo-muy-oscuro  border border-2 border-light p-2">
                                                            <h4 class="text-center text-light fs-4 p-3 text-uppercase">
                                                                {{ $dato['producto']->name }}</h4>
                                                            <h5 class="text-center text-light fs-4 p-2">
                                                                {{ $dato['paquete']->numero_clases }} clases incluidas</h5>
                                                            <h6 class="text-danger text-center fs-4 p-1">
                                                                {{ $dato['paquete']->precio }}€</h6>
                                                            <div class="d-flex justify-content-center align-items-center">
                                                                <form
                                                                    action="{{ route('clasePaquete.edit', $dato['paquete']->id) }}"
                                                                    method="GET">
                                                                    @csrf
                                                                    <input class="text-bg-success fs-5" type="submit"
                                                                        value="Editar">
                                                                </form>
                                                                <form
                                                                    action="{{ route('clasePaquete.destroy', $dato['paquete']->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <input class="text-bg-danger text-uppercase fs-5"
                                                                        type="submit" value="Borrar">
                                                                </form>
                                                            </div>

                                                        </div>
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade container-fluid w-100 h-100 {{ $edicion === 'suscripcion' ? 'active show' : '' }}"
                            id="imagenes-seccion" role="tabpanel" aria-labelledby="imagenes-seccion" tabindex="0">
                            <div
                                class="container-fluid w-100 d-flex flex-column justify-content-center align-items-center">

                                <div class="row w-100">
                                    <div class="col p-4">
                                        <form class="container-fluid" action="{{ route('membresia.store') }}"
                                            method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col d-flex gap-2">
                                                    <div class="row">
                                                        <input class="estilo-formulario" type="text" name="nombre"
                                                            placeholder="Nombre">
                                                        <hr
                                                            class="linea-transition-weigth border border-warning-subtle  border-1 ">
                                                    </div>
                                                    <div class="row">
                                                        <input class="estilo-formulario" type="number" name="precio"
                                                            placeholder="Precio">
                                                        <hr
                                                            class="linea-transition-weigth border border-warning-subtle  border-1 ">
                                                    </div>
                                                    <div class="row">
                                                        <input class="estilo-formulario" type="text"
                                                            name="descripcion" placeholder="Descripción">
                                                        <hr
                                                            class="linea-transition-weigth border border-warning-subtle  border-1 ">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <input class="estilo-formulario estilo-formulario-enviar"
                                                        type="submit" value="Crear Membresía">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="row flex-grow-1 w-100">
                                    <div class="col">
                                        <div class="row row-cols-3">
                                            @foreach ($membresias as $membresia)
                                                <div class="col pt-2 pb-2" id="{{ $membresia->id }}">
                                                    @if (isset($editable) && $edicion == 'suscripcion' && $membresia->id == $editable)
                                                        <form
                                                            class="col  bg-color-fondo-muy-oscuro border border-2 border-light"
                                                            action="{{ route('membresia.update', $membresia->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <input class="estilo-formulario" type="text"
                                                                name="nombre_editable"
                                                                value="{{ old('nombre-editable', $membresia->nombre) }}">
                                                            <input class="estilo-formulario" type="number"
                                                                name="precio_editable"
                                                                value="{{ old('precio-editable', $membresia->precio) }}">
                                                            <input class="estilo-formulario" type="text"
                                                                name="descripcion_editable"
                                                                value="{{ old('descripcion-editable', $membresia->descripcion) }}">
                                                            <input class="estilo-formulario estilo-formulario-enviar"
                                                                type="submit" value="Editar Membresía">
                                                        </form>
                                                        <form action="{{ route('productos') }}" method="GET">
                                                            <input type="submit" value="Cancelar"
                                                                class="estilo-formulario estilo-formulario-enviar text-danger-emphasis">

                                                        </form>
                                                    @else
                                                        <div
                                                            class="col bg-color-fondo-muy-oscuro  border border-2 border-light p-2">
                                                            <h4 class="text-center text-light fs-4 p-3 text-uppercase">
                                                                {{ $membresia->nombre }}</h4>
                                                            <h5 class="text-center text-light fs-4 p-2">
                                                                {{ $membresia->descripcion }}</h5>
                                                            <h6 class="text-danger text-center fs-4 p-1">
                                                                {{ $membresia->precio }}€</h6>
                                                            <div class="d-flex justify-content-center align-items-center">
                                                                <form
                                                                    action="{{ route('membresia.edit', $membresia->id) }}"
                                                                    method="GET">
                                                                    @csrf
                                                                    <input class="text-bg-success fs-5" type="submit" value="Editar">
                                                                </form>
                                                                <form
                                                                    action="{{ route('membresia.destroy', $membresia->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <input class="text-bg-danger text-uppercase fs-5" type="submit" value="Borrar">
                                                                </form>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
