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
        @for ($day = 1; $day <= 365; $day++)
            <div class="dia-timeline">
                @php
                    $diaTimeline = new DateTime();
                    $diaTimeline->setDate('2024', 1, 1);
                    $diaTimeline->modify('+' . ($day - 1) . ' days');
                @endphp
                <div class="fecha-timeline">{{ $diaTimeline->format('y-m-d') }}</div>
                <div class="day" data-day="{{ $day }}">
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
                                <div class="evento evento-{{ $evento['evento']->clase_id }}"
                                    style="top: {{ $evento['posicionArriba'] }}em; height: {{ $evento['alturaDiv'] }}em;">
                                    {{ $evento['evento']->clase->nombre }}
                                </div>
                            @endif
                            
                        @endforeach
                        
                    @endfor
                </div>
            </div>
        @endfor
    </div>
@endsection
