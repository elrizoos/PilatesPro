@extends('admin/panel-control')

@section('GRUP-inicio')
    <div class="contenedor-tabla">
        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Participantes</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alumnos as $grupo)
                
                    <tr>
                        <td>{{$grupo['id']}}</td>
                        <td>{{$grupo['nombreGrupo']}}</td>
                        <td>
                            @foreach ($grupo['participantes'] as $participante)
                                {{ $participante->nombre}}<br>
                            @endforeach
                        </td>
                        <td>
                            <form action="{{ route('grupo.edit', ['grupo' => $grupo['id']]) }}">
                                <input type="submit" value="Editar">
                            </form>

                            <form action="{{ route('grupo.destroy', ['grupo' => $grupo['id']]) }}">
                                <input type="submit" value="Eliminar">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
