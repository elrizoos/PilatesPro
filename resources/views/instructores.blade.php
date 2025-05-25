@extends('layouts.app')

@section('content')
    <div class="container-fluid bg-color-oscuro w-100 vh-100 p-5">
        <div class="text-center mb-5">
            <h1 class="fs-2 texto-color-titulo text-uppercase">Nuestros Instructores</h1>
            <p class="texto-color-gris fs-4">Conozca a nuestro equipo de instructores altamente cualificados y dedicados.</p>
        </div>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach ($instructores as $instructor)
                <div class="col">
                    <div class="card h-100 bg-color-fondo">
                        @if(isset($instructor->imagen))
                            <img src="{{ asset('storage/' . $instructor->imagen->ruta_imagen) }}" class="card-img-top" alt="{{ $instructor->nombre }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title texto-color-resalte">{{ $instructor->nombre }}</h5>
                            
                        </div>
                        
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
