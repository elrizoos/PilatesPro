@extends('admin/panel-control')

@section('FACTU-membresias')
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
@endsection
