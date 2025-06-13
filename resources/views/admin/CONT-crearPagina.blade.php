@extends('admin/panel-control')

@section('CONT-crearPagina')
<div class="container-fluid w-100 h-100">
    <form class="w-100 h-100 d-flex flex-column justify-content-center align-items-center"
        action="{{ isset($pagina) ? route('pagina.update', ['pagina' => $pagina->id]) : route('pagina.store') }}"
        method="POST">
        @csrf
        @isset($pagina)
        @method('PUT')
        @endisset

        <div class="row formulario-pagina">
            <div class="form-group ">
                <label for="titulo">Titulo de la página</label>
                <input class="p-1 w-100 text-center" type="text" name="titulo" id="titulo" value="{{ isset($pagina) ? $pagina->titulo : '' }}">
              

                @error('titulo')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group ">
                <label for="descripcion">Descripción</label>
                <input class="p-1 w-100 text-center" type="text" name="descripcion" id="descripcion" value="{{ isset($pagina) ? $pagina->descripcion : '' }}">
                

                @error('descripcion')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col">
                <input class="estilo-formulario estilo-formulario-enviar" type="submit" value="{{ isset($pagina) ? 'Actualizar Página' : 'Crear Página' }}">
            </div>
        </div>
    </form>
</div>
@endsection