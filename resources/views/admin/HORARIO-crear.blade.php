@extends('admin/panel-control')

@section('HORARIO-crear')
    <div class="contenedor-formulario w-100 h-100 d-flex justify-content-center align-items-center">
        <form class="formulario formulario-horario w-100 h-100 p-5" action="{{ route('horario.store') }}"
            method="POST">
            @csrf
            <div class="central">
                <div class="inputs gap-3">
                    <div class="contenedor-calendario" id="contenedorCalendario">
                        <div class="encabezado-calendario">
                            <span class="anno-anterior"></span>
                            <span class="mes-anterior"></span>
                            <span class="mes-anno-actual" id="mesAnnoActual"></span>
                            <span class="mes-siguiente"></span>
                            <span class="anno-siguiente"></span>
                        </div>
                        <div class="cuerpo-calendario">
                            <div class="nombres-dias">
                                <div>L</div>
                                <div>M</div>
                                <div>X</div>
                                <div>J</div>
                                <div>V</div>
                                <div>S</div>
                                <div>D</div>
                            </div>
                            <div class="dias-mes" id="diasMes">

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


                    <div class="contenedor-fecha-placeholder">
                        <input id="fechaEspecifica" type="date" name="fechaEspecifica"
                            value="{{ isset($horario) ? $horario->fecha_especifica : '' }}">
                        <label {{ isset($horario) ? 'hidden' : '' }} id="fechaPlaceholder" class="fecha-placeholder"
                            for="fecha_placeholder">--- Selecciona una
                            fecha concreta
                            ---</label>
                    </div>
                    <select name="tiempoClase" id="tiempoClase" data-value="45">
                        <option value="">--- Selecciona el tiempo de clase ---</option>
                        <option value="45">45 minutos</option>
                        <option value="60">60 minutos</option>
                        <option value="120">120 minutos</option>
                    </select>
                    <input type="time" name="horaInicio" id="horaInicio" hidden
                        value="{{ isset($horario) ? $horario->hora_inicio : '' }}">
                    <input type="time" name="horaFin" id="horaFin" hidden
                        value="{{ isset($horario) ? $horario->hora_fin : '' }}">
                    <div class="grupo-error">
                        @error('clase')
                            <span class="invalid-feedback active-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        @error('diaSemana')
                            <span class="invalid-feedback active-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        @error('fechaEspecifica')
                            <span class="invalid-feedback active-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        @error('horaIncio')
                            <span class="invalid-feedback active-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        @error('horaFin')
                            <span class="invalid-feedback active-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div id="inicioFinContenedor" class="inicioFin">

                    <div class="contenedor-horas">

                        <div class="horas">
                            <div class="hora-inicio">
                                <div class="titulo-hora">Hora Inicio</div>
                                <div class="muestreo-hora">
                                    <div class="hora-minuto">
                                        <div class="contenedor-hora-minuto">
                                            <div class="hora">00</div>
                                            <div class="puntos">:</div>
                                            <div class="minutos">00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hora-fin">
                                <div class="titulo-hora">Hora Fin</div>
                                <div class="muestreo-hora">
                                    <div class="hora-minuto">
                                        <div class="contenedor-hora-minuto">
                                            <div class="hora">00</div>
                                            <div class="puntos">:</div>
                                            <div class="minutos">00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="seleccion-horas d-none">
                            <div class="contenedor-seleccion">
                                <h2 id="inicioFin"></h2>
                                <div class="hora-minuto">
                                    <div class="contenedor-hora-minuto">
                                        <input disabled placeholder="00" class="casillaReloj" type="number" id="horaProvisional">
                                        <div class="puntos">:</div>
                                        <input disabled placeholder="00" class="casillaReloj" type="number" id="minutosProvisional">
                                    </div>
                                </div>
                                <div class="reloj">
                                    <div class="circulo">
                                        <div class="norte">12</div>
                                        <div class="este">3</div>
                                        <div class="sur">6</div>
                                        <div class="oeste">9</div>
                                        <div class="punto-centro"></div>
                                        <div class="aguja-minuto aguja-minuto-cero"></div>
                                        <div class="aguja-hora"></div>
                                    </div>
                                </div>
                                <div class="barra-seleccion">
                                    <input id="sliderHoras" type="range" id="horaMinuto" min="0" max="287"
                                        value="0">
                                </div>
                                <input class="botonSeleccion" id="seleccionarHora" type="button" value="Seleccionar">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="repeticion">
                    <div class="grupo-input">
                        <label for="repetir">¿Quieres que esta clase se repita algun dia mas?</label>
                        <input type="checkbox" name="repetir" id="repetir">Sí
                    </div>
                    <div class="grupo-input opcionRepetir position-relative top-0 start-0 mt-3">
                        <input class="estilo-formulario" type="number" name="numeroSemanas"
                           value="0" placeholder="Numero de semanas">
                        <hr class="mt-0 w-100 linea-transition-weigth border border-warning-subtle  border-1 ">

                        <ul class="listaDiasSemana row row-cols-3">
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

            <div class="botonEnviar mt-5">
                <input class="estilo-formulario estilo-formulario-enviar" type="submit" value="Crear clase nueva">
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
