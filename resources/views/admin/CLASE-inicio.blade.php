@extends('admin/panel-control')

@section('CLASE-inicio')
    <div class=" container-fluid d-flex flex-column justify-content-center align-items-center h-100">
        <table class="table tabla-dorada w-100 fs-5 bg-color-terciario text-center">
            <thead>
                <tr class="text-uppercase">
                    <th class="texto-color-titulo border border-2 border-fondo">Nombre</th>
                    <th class="texto-color-titulo border border-2 border-fondo">Grupo</th>
                    <th class="texto-color-titulo border border-2 border-fondo">Opciones</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($clases as $clase)
                    <tr>
                        <td class="texto-color-resalte border border-2 border-fondo">{{ $clase->nombre }}</td>
                        <td class="texto-color-resalte border border-2 border-fondo">{{ $clase->grupo->nombre }}</td>
                        <td class="texto-color-resalte border border-2 border-fondo">
                            <form action="{{ route('clase.edit', ['clase' => $clase->id]) }}">
                                <input class="texto-color-resalte estilo-formulario" type="submit" value="Editar">
                            </form>

                            <form action="{{ route('clase.destroy', ['clase' => $clase->id]) }}">
                                <input class="texto-color-resalte estilo-formulario" type="submit" value="Borrar">
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
