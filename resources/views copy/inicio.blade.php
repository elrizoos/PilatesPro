@extends('layouts.app')

@section('content')
    @if (session('registro-exitoso'))
        <div>
            {{ session('registro-exitoso') }}
        </div>
    @endif
    <?php 
        for ($i=1; $i < 6; $i++) { 
            ?>
            @include('secciones-inicio.seccion-' . $i)
            <?php 
        }
    ?>
    
    
    
@endsection
