@extends('usuario.general')
@section('fotoPerfil')
<form id="formularioFotoPerfil" action="{{ route('imagen.store') }}" method="POST"
    enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="tipo_informacion" value="informacionContacto">
    <input type="hidden" name="usuario" value="{{ Auth::user()->email }}">
    <div>
        <label for="fotoPerfil">Foto de perfil actual:</label>
        @if (auth()->user()->imagen)
            <img src="{{ asset('storage/' . auth()->user()->imagen->ruta_imagen) }}" alt="Imagen de perfil">
        @else
            <p>No hay imagen de perfil</p>
        @endif

        <input type="file" name="fotoPerfil" id="fotoperfil">
    </div>
    <div>
            <input type="submit" value="Guardar cambios">
        </div>
</form>
@if(Auth()->user()->imagen){
<form action="{{ route('imagen.destroy', ['imagen' => Auth()->user()->imagen->id]) }}" method="POST">
    @csrf
    @method('DELETE')
    <button id="borrarFoto" type="submit">Eliminar Imagen</button>
</form>
}@endif

<script>
    var imagenStore = "{{ route('imagen.store') }}";
</script>
@vite(['resources/js/contenidoInterno.js'])
@endsection