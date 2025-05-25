@extends('admin/panel-control')

@section('CONT-crearPagina')
    <div class="container-fluid w-100 h-100">
        <form class="formulario"
            class="formulario w-100 h-100 container-fluid  fs-5  p-2 d-md-flex flex-column align-items-center justify-content-center"
            action="{{ isset($pagina) ? route('pagina.update', ['pagina' => $pagina->id]) : route('pagina.store') }}"
            method="POST">
            @csrf
            @isset($pagina)
                @method('PUT')
            @endisset

            <div class="row">
                <div class="col">
                    <input class="p-1 estilo-formulario w-100 text-center" type="text" name="titulo" id="titulo"
                        placeholder="Título de la página">
                    <hr class="mt-0 w-100 linea-transition-weigth border border-warning-subtle  border-1 ">

                    @error('titulo')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col">
                    <input class="p-1 estilo-formulario w-100 text-center" type="text" name="descripcion"
                        id="descripcion" placeholder="Descripción">
                    <hr class="mt-0 w-100 linea-transition-weigth border border-warning-subtle  border-1 ">

                    @error('descripcion')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input class="estilo-formulario estilo-formulario-enviar" type="submit" value="Crear Pagina Nueva">
                </div>
            </div>
        </form>
    </div>
@endsection
