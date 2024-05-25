@extends('admin/panel-control')

@section('clasePaquete-inicio')
    <div class="contenedor-paquete">
        <div class="contenedor-listado-paquete">
            @foreach ($datos as $dato)
                <div class="paquete {{ $dato['paquete']->id == session('editable') ? 'editable' : '' }}" id="{{ $dato['paquete']->id }}">
                    @if ($dato['paquete']->id == session('editable'))
                        <form class="paquete-formulario" action="{{ route('clasePaquete.update', $dato['paquete']->id) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <input class="estilo-formulario" type="text" name="nombre_editable"
                                value="{{ old('nombre-editable', $dato['producto']->name ) }}">
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
                            <form action="{{ route('clasePaquete.destroy', $dato['paquete']->id) }}" method="POST">
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
@endsection
