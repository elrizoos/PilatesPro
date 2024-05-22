@extends('admin/panel-control')

@section('FACTU-membresias')
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
@endsection
