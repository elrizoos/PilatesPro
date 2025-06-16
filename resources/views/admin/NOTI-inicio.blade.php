@extends('admin/panel-control')

@section('NOTI-inicio')
    <div class="container-fluid  d-flex flex-column justify-content-center align-items-center h-100 w-100 rounded-5 ">
        <table class="table tabla-dorada w-100 fs-5 bg-color-terciario text-center">
            <thead>
                <tr>
                    <th class="fs-5 texto-color-titulo border border-1 border-fondo">Tipo Notificacion</th>
                    <th class="fs-5 texto-color-titulo border border-1 border-fondo">Titulo</th>
                    <th class="fs-5 texto-color-titulo border border-1 border-fondo">Descripcion</th>
                    <th class="fs-5 texto-color-titulo border border-1 border-fondo">Mensaje</th>
                    <th class="fs-5 texto-color-titulo border border-1 border-fondo">Importancia</th>
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
                            <td class="texto-color-resalte border border-1 border-fondo">{{ $notificacion->tipo }}</td>
                            <td class="texto-color-resalte border border-1 border-fondo">{{ $notificacion->titulo }}</td>
                            <td class="texto-color-resalte border border-1 border-fondo">
                                {{ $notificacion->descripcion ?? 'S/A' }}</td>
                            <td class="texto-color-resalte border border-1 border-fondo">{{ $notificacion->mensaje }}</td>
                            <td class="texto-color-resalte border border-1 border-fondo">{{ $notificacion->importante }}
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
                <div class="row">
                    <div class="form-group ">
                        <label for="tipo">Tipo de notificacion</label>
                        <select name="tipo" id="tipo">
                            <option value="email">Email</option>
                        </select>
                    </div>
                    <div class="form-group"><label for="titulo">Titulo</label>
                        <input type="text" name="titulo">
                    </div>
                    <div class="form-group"><label for="descripcion">Descripcion</label>
                        <input type="text" name="descripcion" id="descripcion">
                    </div>
                    <div class="form-group"><label for="mensaje">Mensaje:</label>
                        <textarea name="mensaje" id="mensaje" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="importante">Importante:</label>
                        <select name="importante" id="importante">
                            <option value="0">No</option>
                            <option value="1">Si</option>
                        </select>
                    </div>
                </div>


                <input id="inputNotificacion" type="submit" value="Enviar Notificacion">
            </form>
        </div>
    </div>

    <script>
        $('#enviarNotificacion').on('click', function() {
            $('#fomrNotificacion').toggleClass('d-none');
        });
    </script>
@endsection
