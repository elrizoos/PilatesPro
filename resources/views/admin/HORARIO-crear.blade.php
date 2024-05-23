@extends('admin/panel-control')

@section('HORARIO-crear')
    <div>
        <form action="{{ route('horario.store') }}" method="POST">
            @csrf
            <div>
                <div>
                    <div id="contenedorCalendario">
                        <div>
                            <span></span>
                            <span></span>
                            <span id="mesAnnoActual"></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div>
                            <div>
                                <div>L</div>
                                <div>M</div>
                                <div>X</div>
                                <div>J</div>
                                <div>V</div>
                                <div>S</div>
                                <div>D</div>
                            </div>
                            <div id="diasMes">

                            </div>
                        </div>
                    </div>
                    <select name="clase" id="clase">
                        <option value="0">--- Selecciona una clase ---</option>
                        @foreach ($clases as $clase)
                            <option {{ isset($horario) && $horario->clase_id === $clase->id ? 'selected' : '' }}
                                value="{{ $clase->id }}">{{ $clase->nombre }}</option>
                        @endforeach
                    </select>


                    <div>
                        <input id="fechaEspecifica" type="date" name="fechaEspecifica"
                            value="{{ isset($horario) ? $horario->fecha_especifica : '' }}">
                        <label {{ isset($horario) ? 'hidden' : '' }} id="fechaPlaceholder"
                            for="fecha_placeholder">--- Selecciona una
                            fecha concreta
                            ---</label>
                    </div>
                    <input type="time" name="horaInicio" id="horaInicio" hidden
                        value="{{ isset($horario) ? $horario->hora_inicio : '' }}">
                    <input type="time" name="horaFin" id="horaFin" hidden
                        value="{{ isset($horario) ? $horario->hora_fin : '' }}">
                    <div>
                        @error('clase')
                            <span role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        @error('diaSemana')
                            <span role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        @error('fechaEspecifica')
                            <span role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        @error('horaIncio')
                            <span role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        @error('horaFin')
                            <span role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div id="inicioFinContenedor">

                    <div>

                        <div>
                            <div>
                                <div>Hora Inicio</div>
                                <div>
                                    <div>
                                        <div>
                                            <div>00</div>
                                            <div>:</div>
                                            <div>00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div>Hora Fin</div>
                                <div>
                                    <div>
                                        <div>
                                            <div>00</div>
                                            <div>:</div>
                                            <div>00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div>
                                <h2 id="inicioFin"></h2>
                                <div>
                                    <div>
                                        <input placeholder="00" type="number" id="horaProvisional">
                                        <div>:</div>
                                        <input placeholder="00" type="number" id="minutosProvisional">
                                    </div>
                                </div>
                                <div>
                                    <div>
                                        <div>12</div>
                                        <div>3</div>
                                        <div>6</div>
                                        <div>9</div>
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                    </div>
                                </div>
                                <div>
                                    <input id="sliderHoras" type="range" id="horaMinuto" min="0" max="287"
                                        value="0">
                                </div>
                                <input id="seleccionarHora" type="button" value="Seleccionar">
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div>
                        <label for="repetir">¿Quieres que esta clase se repita algun dia mas?</label>
                        <input type="checkbox" name="repetir" id="repetir">
                    </div>
                    <div>
                        <input type="number" name="numeroSemanas"
                            placeholder="Numero de semanas">
                        <ul>
                            <li>
                                <label for="lunes">Lunes</label>
                                <input type="checkbox" name="diasSemana[]" id="lunes" value="0">
                            </li>
                            <li>
                                <label for="martes">martes</label>
                                <input type="checkbox" name="diasSemana[]" id="martes" value="1">
                            </li>
                            <li>
                                <label for="miercoles">miercoles</label>
                                <input type="checkbox" name="diasSemana[]" id="miercoles" value="2">
                            </li>
                            <li>
                                <label for="jueves">jueves</label>
                                <input type="checkbox" name="diasSemana[]" id="jueves" value="3">
                            </li>
                            <li>
                                <label for="viernes">viernes</label>
                                <input type="checkbox" name="diasSemana[]" id="viernes" value="4">
                            </li>
                            <li>
                                <label for="sabado">sabado</label>
                                <input type="checkbox" name="diasSemana[]" id="sabado" value="5">
                            </li>
                        </ul>
                    </div>
                </div>


            </div>

            <div>
                <input type="submit" value="Crear clase nueva">
            </div>

        </form>
    </div>

    <script>
        let valorHoraInicio = $('#horaInicio').val();
        let valorHoraFin = $('#horaFin').val();

        const horaInicio = $('.hora-inicio .hora');
        const minutoInicio = $('.hora-inicio .minutos');

        const horaFin = $('.hora-fin .hora');
        const minutoFin = $('.hora-fin .minuto');

        if (valorHoraInicio !== '') {
            let hora = valorHoraInicio.split(':');
            let minutos = hora[1];
            let horas = hora[0];

            horaInicio.text(horas);
            minutoInicio.text(minutos);
        }

        if (valorHoraFin !== '') {
            let hora = valorHoraFin.split(':');
            let minutos = hora[1];
            let horas = hora[0];

            horaFin.text(horas);
            minutoFin.text(minutos);
        }
    </script>
@endsection
