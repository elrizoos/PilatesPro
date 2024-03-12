@extends('usuario.reservas')
@section('sugerenciasReservas')
    <p>Seccion para ver futuras clases a reservar.</p>
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>Lunes</th>
                <th>Martes</th>
                <th>Miercoles</th>
                <th>Jueves</th>
                <th>Viernes</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
            </tr>
        </tbody>
    </table>
    @vite(['resources/js/contenidoInterno.js'])
@endsection