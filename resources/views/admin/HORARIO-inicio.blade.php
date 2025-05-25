@extends('admin/panel-control')

@section('HORARIO-inicio')
    <div class="timeline">
        <div class="horas-timeline">
            <div></div>
            @for ($i = 8; $i < 21; $i++)
                @if ($i < 10)
                    <div class="numeroHora">0{{ $i * 01.0 }}:00</div>
                @else
                    <div class="numeroHora">{{ $i * 01.0 }}:00</div>
                @endif
            @endfor
        </div>
        <div class="contenedor-horario">
            @for ($day = 1; $day <= 365; $day++)
                @php
                    $diaTimeline = new DateTime();
                    $diaTimeline->setDate('2024', 1, 1);
                    $diaTimeline->modify('+' . ($day - 1) . ' days');
                    $par = $day % 2 === 0 ? true : false;
                @endphp
                <div class="dia-timeline {{ $par == true ? 'par' : 'impar' }}">

                    <div class="fecha-timeline {{ $par == true ? 'par' : 'impar' }}"">{{ $diaTimeline->format('y-m-d') }}
                    </div>
                    <div class="day" data-day="{{ $day }}" id="{{ $day === $today ? 'today' : '' }}">
                        @for ($i = 8; $i < 20; $i++)
                            @foreach ($eventosFormateados as $evento)
                                @php
                                    $horaEvento = new DateTime($evento['evento']->hora_inicio);
                                    $horaEvento = $horaEvento->format('H');
                                    //dd($horaEvento);
                                    $vacio = true;
                                @endphp
                                @if ($evento['numeroDia'] == $day && $horaEvento == $i)
                                    @php
                                        $vacio = false;
                                    @endphp
                                    <div class="evento evento-{{ $evento['evento']->id }} " id="evento-{{ $evento['evento']->id }}"
                                        style="top: {{ $evento['posicionArriba'] }}em; height: {{ $evento['alturaDiv'] }}em;">
                                        {{ $evento['evento']->clase->nombre }}
                                        <div class="informacion-evento">
                                            <h5 class="clase">{{ $evento['evento']->clase->nombre }}</h5>
                                            <h6 class="profesor">Profesor:
                                                <span>{{ $evento['evento']->clase->grupo->profesor->nombre }}</span></h6>
                                            <h6 class="grupo">Grupo:
                                                <span>{{ $evento['evento']->clase->grupo->nombre }}</span></h6>
                                            <h6 class="horaInicio">Hora Inicio:
                                                <span>{{ $evento['evento']->hora_inicio }}</span></h6>
                                            <h6 class="horaFin">Hora Fin: <span>{{ $evento['evento']->hora_fin }}</span>
                                            </h6>
                                            <h6 class="dia">Día: <span>{{ $evento['evento']->dia_semana }}</span></h6>
                                            <h6 class="fecha">Fecha:
                                                <span>{{ $evento['evento']->fecha_especifica }}</span></h6>

                                        </div>

                                        <form hidden action="{{ route('horario.edit', ['horario' => $evento['evento']->id]) }}" method="get">
                                            @csrf
                                            <input type="submit" value="Editar">
                                        </form>
                                    </div>
                                @endif
                            @endforeach
                        @endfor
                    </div>
                </div>
            @endfor
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#today').get(0).scrollIntoView({
                behavior: 'smooth',
                block: 'nearest',
                inline: 'start'
            });
            
        });
    </script>
@endsection
