@extends('admin/panel-control')

@section('CONT-crearPagina')
    @if (session('success'))
        <div class="alert alert-success ventana-emergente">
            <p>{{ session('success') }}</p>
            <span id=cerrarBoton></span>
        </div>
    @endif
    <div class="contenedor-formulario">
        <form action="{{ isset($pagina) ? route('pagina.update', ['pagina' => $pagina->id]) :  route('pagina.store') }}" class="formulario-pagina-nueva formulario-corto" method="POST">
            @csrf
            @isset($pagina)
                @method('PUT')
            @endisset
            <div class="grupo-formulario">
                <div class="grupo-input">
                    @isset($pagina)
                        <input class="estilo-formulario" type="text" name="titulo" id="titulo"
                            placeholder="Título de la página" value="{{  $pagina->titulo  }}">
                        <input class="estilo-formulario" type="text" name="descripcion" id="descripcion"
                            placeholder="Descripción" value="{{  $pagina->descripcion }}">
                    @else 
                        
                    <input class="estilo-formulario" type="text" name="titulo" id="titulo"
                        placeholder="Título de la página" >
                    <input class="estilo-formulario" type="text" name="descripcion" id="descripcion"
                        placeholder="Descripción" >
               
                    @endif
                </div>
                <div class="grupo-error">
                    @error('titulo')
                        <span class="invalid-feedback active-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    @error('descripcion')
                        <span class="invalid-feedback active-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="grupo-formulario">
                <div class="grupo-input">
                    <input type="submit" value="Crear Pagina Nueva">
                </div>
            </div>
        </form>
    </div>
@endsection
