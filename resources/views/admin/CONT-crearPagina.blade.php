@extends('admin/panel-control')

@section('CONT-crearPagina')
    
    <div>
        <form action="{{ isset($pagina) ? route('pagina.update', ['pagina' => $pagina->id]) :  route('pagina.store') }}" method="POST">
            @csrf
            @isset($pagina)
                @method('PUT')
            @endisset
            <div>
                <div>
                    @isset($pagina)
                        <input type="text" name="titulo" id="titulo"
                            placeholder="Título de la página" value="{{  $pagina->titulo  }}">
                        <input type="text" name="descripcion" id="descripcion"
                            placeholder="Descripción" value="{{  $pagina->descripcion }}">
                    @else 
                        
                    <input type="text" name="titulo" id="titulo"
                        placeholder="Título de la página" >
                    <input type="text" name="descripcion" id="descripcion"
                        placeholder="Descripción" >
               
                    @endif
                </div>
                <div>
                    @error('titulo')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    @error('descripcion')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div>
                <div>
                    <input type="submit" value="Crear Pagina Nueva">
                </div>
            </div>
        </form>
    </div>
@endsection
