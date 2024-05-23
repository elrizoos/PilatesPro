@extends('admin/panel-control')

@section('HORARIO-inicio')
    <div>
        <div>
            <div></div>
            @for ($i = 8; $i < 21; $i++)
                @if ($i < 10)
                    <div>0{{ $i * 01.0 }}:00</div>
                @else
                    <div>{{ $i * 01.0 }}:00</div>
                @endif
            @endfor
        </div>
        <div>
            @for ($day = 1; $day <= 365; $day++)
                @php
                    $diaTimeline = new DateTime();
                    $diaTimeline->setDate('2024', 1, 1);
                    $diaTimeline->modify('+' . ($day - 1) . ' days');
                    $par = $day % 2 === 0 ? true : false;
                @endphp
                <div>

                    <div">{{ $diaTimeline->format('y-m-d') }}
                    </div>
                    <div data-day="{{ $day }}" id="{{ $day === $today ? 'today' : '' }}">
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
                                    <div
                                        style="top: {{ $evento['posicionArriba'] }}em; height: {{ $evento['alturaDiv'] }}em;">
                                        {{ $evento['evento']->clase->nombre }}
                                        <div>
                                            <h5>{{ $evento['evento']->clase->nombre}}</h5>
                                            <h6>Profesor: <span>{{ $evento['evento']->clase->grupo->profesor->nombre}}</span></h6>
                                            <h6>Grupo: <span>{{ $evento['evento']->clase->grupo->nombre}}</span></h6>
                                            <h6>Hora Inicio: <span>{{$evento['evento']->hora_inicio}}</span></h6>
                                            <h6>Hora Fin: <span>{{$evento['evento']->hora_fin}}</span></h6>
                                            <h6>Día: <span>{{$evento['evento']->dia_semana}}</span></h6>
                                            <h6>Fecha: <span>{{$evento['evento']->fecha_especifica}}</span></h6>

                                        </div>
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
