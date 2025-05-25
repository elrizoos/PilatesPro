@extends('usuario.otros')
@section('notificaciones')
<div id="contenedor-notificaciones">
    <h3>Configuración de Notificaciones</h3>
    <form action="{{route('asignarNotificacion')}}" method="POST">
        @csrf
        <div class="form-group">
            <label>Email</label>
            <select name="email" class="form-control">
                <option value="todo" {{$notificacion != null ? $notificacion->email == 'todo' ? 'selected' : '' : ''}}>Recibir todas las notificaciones</option>
                <option value="importante" {{$notificacion != null ? $notificacion->email == 'importante' ? 'selected' : '' : ''}}>Solo notificaciones importantes</option>
                <option value="no" {{$notificacion != null ? $notificacion->email == 'no' ? 'selected' : '' : ''}}>No recibir notificaciones</option>
            </select>
        </div>
       
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
    @vite(['resources/js/contenidoInterno.js'])
@endsection