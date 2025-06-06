@extends('usuario.general') @section('fotoPerfil')

<div class="row fila-imagen-perfil">
    <div class="foto-perfil">
        @if (auth()->user()->imagen)
        <img class="img-fluid" src="{{ asset('storage/' . auth()->user()->imagen->ruta_imagen) }}"
            alt="Foto de perfil" />

        @else
        <img class="imagen-perfil-usuario" src="{{ asset('imagenes/usuario.png') }}" alt="Foto usuario" />
        @endif
    </div>
</div>

<div class="row fila-inputs-imagen">

    @if (auth()->user()->imagen)
    <form action="{{ route('imagen.update', ['imagen' => auth()->user()->imagen->id]) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input name="fotoPerfil" type="file" required />
        <input type="submit" value="Actualizar foto" />
    </form>
    <form class="destroy" action="{{ route('imagen.destroy', ['imagen' => auth()->user()->imagen->id])}}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="Eliminar foto" />
    </form>

    @else
    <form id="formularioFotoPerfil" action="{{ route('imagen.store') }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="tipo_informacion" value="informacionContacto" />
        <input type="hidden" name="usuario" value="{{ Auth::user()->email }}" />
        <input hidden type="file" name="fotoPerfil" id="inputFotoPerfil" />

        <input name="fotoPerfil" type="file" />
        <input type="submit" value="Subir Imagen" />
    </form>
    @endif
</div>
@vite(['resources/js/contenidoInterno.js']) @endsection
