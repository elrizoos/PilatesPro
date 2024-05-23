@extends('admin/panel-control')

@section('FACTU-productos')
    <div>
        <div>
            <p>¿Qué vas a gestionar?</p>
            <div>
                <div id="mostrarPaquetes">Paquetes de clases</div>
                <div id="mostrarMembresias">Membresias</div>
            </div>
        </div>
        <div>
            <div>
                <div>
                    @foreach ($datos as $dato)
                        <div
                            id="{{ $dato['paquete']->id }}">
                            @if ($dato['paquete']->id == session('editable'))
                                <form
                                    action="{{ route('clasePaquete.update', $dato['paquete']->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="nombre_editable"
                                        value="{{ old('nombre-editable', $dato['producto']->name) }}">
                                    <input type="number" name="numero_clases_editable"
                                        value="{{ old('numero_clases_editable', $dato['paquete']->numero_clases) }}">
                                    <input type="text" name="precio_editable"
                                        value="{{ old('precio-editable', $dato['paquete']->precio) }}">
                                    <input type="submit" value="Editar Paquete">
                                </form>
                            @else
                                <h4>{{ $dato['producto']->name }}</h4>
                                <h5>{{ $dato['paquete']->numero_clases }}</h5>
                                <h6>{{ $dato['paquete']->precio }}€</h6>
                                <div>
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
                <div>
                    <form action="{{ route('clasePaquete.store') }}" method="POST">
                        @csrf
                        <input type="text" name="numero_clases" placeholder="Numero de clases">
                        <input type="number" name="precio" placeholder="Precio">
                        <input type="text" name="nombre" placeholder="Nombre paquete">
                        <input type="submit" value="Crear Paquete de clases">
                    </form>
                </div>
            </div>
        </div>
        <div>
            <div>
                <div>
                    @foreach ($membresias as $membresia)
                        <div
                            id="{{ $membresia->id }}">
                            @if ($membresia->id == session('editable'))
                                <form action="{{ route('membresia.update', $membresia->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="nombre_editable"
                                        value="{{ old('nombre-editable', $membresia->nombre) }}">
                                    <input type="number" name="precio_editable"
                                        value="{{ old('precio-editable', $membresia->precio) }}">
                                    <input type="text" name="descripcion_editable"
                                        value="{{ old('descripcion-editable', $membresia->descripcion) }}">
                                    <input type="submit" value="Editar Membresía">
                                </form>
                            @else
                                <h4>{{ $membresia->nombre }}</h4>
                                <h5>{{ $membresia->descripcion }}</h5>
                                <h6>{{ $membresia->precio }}€</h6>
                                <div>
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
                <div>
                    <form action="{{ route('membresia.store') }}" method="POST">
                        @csrf
                        <input type="text" name="nombre" placeholder="Nombre">
                        <input type="number" name="precio" placeholder="Precio">
                        <input type="text" name="descripcion" placeholder="Descripción">
                        <input type="submit" value="Crear Membresía">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
