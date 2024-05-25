@extends('admin/panel-control')

@section('FACTU-productos')
    <div class="contenedor-productos d-flex flex-column justify-content-center align-items-center">
        <div class="contenedor-productos-seleccion d-flex flex-column gap-5 ">
            <p>¿Qué vas a gestionar?</p>
            <div class="opciones-mostrar d-flex justify-content-between">
                <div class="boton-mostrar" id="mostrarPaquetes">Paquetes de clases</div>
                <div class="boton-mostrar" id="mostrarMembresias">Membresias</div>
            </div>
        </div>
        <div class="clase-paquete d-none">
            <div class="contenedor-paquete">
                <div class="contenedor-listado-paquete">
                    @foreach ($datos as $dato)
                        <div class="paquete {{ $dato['paquete']->id == session('editable') ? 'editable' : '' }}"
                            id="{{ $dato['paquete']->id }}">
                            @if ($dato['paquete']->id == session('editable'))
                                <form class="paquete-formulario"
                                    action="{{ route('clasePaquete.update', $dato['paquete']->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input class="estilo-formulario" type="text" name="nombre_editable"
                                        value="{{ old('nombre-editable', $dato['producto']->name) }}">
                                    <input class="estilo-formulario" type="number" name="numero_clases_editable"
                                        value="{{ old('numero_clases_editable', $dato['paquete']->numero_clases) }}">
                                    <input class="estilo-formulario" type="text" name="precio_editable"
                                        value="{{ old('precio-editable', $dato['paquete']->precio) }}">
                                    <input class="estilo-formulario" type="submit" value="Editar Paquete">
                                </form>
                            @else
                                <h4>{{ $dato['producto']->name }}</h4>
                                <h5>{{ $dato['paquete']->numero_clases }}</h5>
                                <h6>{{ $dato['paquete']->precio }}€</h6>
                                <div class="botones-paquete">
                                    <form action="{{ route('clasePaquete.edit', $dato['paquete']->id) }}" method="GET">
                                        @csrf
                                        <input type="submit" value="Editar">
                                    </form>
                                    <form action="{{ route('clasePaquete.destroy', $dato['paquete']->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Borrar">
                                    </form>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
                <div class="contenedor-paquete-nueva">
                    <form action="{{ route('clasePaquete.store') }}" method="POST">
                        @csrf
                        <input class="estilo-formulario" type="text" name="numero_clases" placeholder="Numero de clases">
                        <input class="estilo-formulario" type="number" name="precio" placeholder="Precio">
                        <input class="estilo-formulario" type="text" name="nombre" placeholder="Nombre paquete">
                        <input class="estilo-formulario" type="submit" value="Crear Paquete de clases">
                    </form>
                </div>
            </div>
        </div>
        <div class="membresias-suscripcion d-none">
            <div class="contenedor-membresia">
                <div class="contenedor-listado-membresia">
                    @foreach ($membresias as $membresia)
                        <div class="membresia {{ $membresia->id == session('editable') ? 'editable' : '' }}"
                            id="{{ $membresia->id }}">
                            @if ($membresia->id == session('editable'))
                                <form class="membresia-formulario" action="{{ route('membresia.update', $membresia->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input class="estilo-formulario" type="text" name="nombre_editable"
                                        value="{{ old('nombre-editable', $membresia->nombre) }}">
                                    <input class="estilo-formulario" type="number" name="precio_editable"
                                        value="{{ old('precio-editable', $membresia->precio) }}">
                                    <input class="estilo-formulario" type="text" name="descripcion_editable"
                                        value="{{ old('descripcion-editable', $membresia->descripcion) }}">
                                    <input class="estilo-formulario" type="submit" value="Editar Membresía">
                                </form>
                            @else
                                <h4>{{ $membresia->nombre }}</h4>
                                <h5>{{ $membresia->descripcion }}</h5>
                                <h6>{{ $membresia->precio }}€</h6>
                                <div class="botones-membresia">
                                    <form action="{{ route('membresia.edit', $membresia->id) }}" method="GET">
                                        @csrf
                                        <input type="submit" value="Editar">
                                    </form>
                                    <form action="{{ route('membresia.destroy', $membresia->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Borrar">
                                    </form>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
                <div class="contenedor-membresia-nueva">
                    <form action="{{ route('membresia.store') }}" method="POST">
                        @csrf
                        <input class="estilo-formulario" type="text" name="nombre" placeholder="Nombre">
                        <input class="estilo-formulario" type="number" name="precio" placeholder="Precio">
                        <input class="estilo-formulario" type="text" name="descripcion" placeholder="Descripción">
                        <input class="estilo-formulario" type="submit" value="Crear Membresía">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
