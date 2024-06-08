@extends('admin/panel-control')

@section('NOTI-inicio')
    <div class="container-fluid  d-flex flex-column justify-content-center align-items-center h-100 w-100 rounded-5 ">
        <table class="table tabla-dorada w-100 fs-5 bg-color-terciario text-center">
            <thead>
                <tr>
                    <th class="texto-color-titulo border border-2 border-fondo">Tipo Notificacion</th>
                    <th class="texto-color-titulo border border-2 border-fondo">Titulo</th>
                    <th class="texto-color-titulo border border-2 border-fondo">Descripcion</th>
                    <th class="texto-color-titulo border border-2 border-fondo">Mensaje</th>
                    <th class="texto-color-titulo border border-2 border-fondo">Importancia</th>
                </tr>
            </thead>
            <tbody>
                @if ($notificaciones->isEmpty())
                    <tr>
                        <td colspan="5">No hay notificaciones enviadas</td>
                    </tr>
                @else
                    @foreach ($notificaciones as $notificacion)
                        <tr>
                            <td class="texto-color-resalte border border-2 border-fondo">{{ $notificacion->tipo }}</td>
                            <td class="texto-color-resalte border border-2 border-fondo">{{ $notificacion->titulo }}</td>
                            <td class="texto-color-resalte border border-2 border-fondo">
                                {{ $notificacion->descripcion ?? 'S/A' }}</td>
                            <td class="texto-color-resalte border border-2 border-fondo">{{ $notificacion->mensaje }}</td>
                            <td class="texto-color-resalte border border-2 border-fondo">{{ $notificacion->importante }}
                            </td>

                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <button id="enviarNotificacion">Enviar Notificacion Nueva</button>
        <div>
            <form class="d-none" id="fomrNotificacion" action="{{ route('enviarNotificacion') }}" method="POST">
                @csrf
                <label for="tipo">Tipo de notificacion</label>
                <select name="tipo" id="tipo">
                    <option value="email">Email</option>
                </select>

                <label for="titulo">Titulo</label>
                <input type="text" name="titulo">

                <label for="descripcion">Descripcion</label>
                <input type="text" name="descripcion" id="descripcion">

                <label for="mensaje">Mensaje:</label>
                <textarea name="mensaje" id="mensaje" cols="30" rows="10">

                </textarea>
                <label for="importante">Importante:</label>
                <select name="importante" id="importante">
                    <option value="0">No</option>
                    <option value="1">Si</option>
                </select>
                <input type="submit" value="Enviar Notificacion">
            </form>
        </div>
    </div>

    <script>
        $('#enviarNotificacion').on('click', function() {
            $('#fomrNotificacion').toggleClass('d-none');
        });
    </script>
@endsection
