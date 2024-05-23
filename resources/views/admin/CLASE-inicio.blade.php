@extends('admin/panel-control')

@section('CLASE-inicio')
    <div>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Grupo</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                
                    @foreach ($clases as $clase)
                    <tr>
                        <td>{{ $clase->nombre }}</td>
                        <td>{{ $clase->grupo->nombre }}</td>
                        <td>
                            <form action="{{ route('clase.edit', ['clase' => $clase->id])}}">
                                <input type="submit" value="Editar">
                            </form>

                            <form action="{{ route('clase.destroy', ['clase' => $clase->id]) }}">
                                <input type="submit" value="Borrar">   
                            </form>
                        </td>
                    </tr>
                    @endforeach
                
            </tbody>
        </table>
    </div>
@endsection
