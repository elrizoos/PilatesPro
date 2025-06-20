@extends('admin/panel-control')

@section('HORARIO-crear')
    <div class="contenedor-formulario w-100 h-100 d-flex justify-content-center align-items-center flex-column p-4">
        <form class="formulario formulario-horario w-100 h-100 p-5"
            action="{{ isset($horario) ? route('horario.update', $horario->id) : route('horario.store') }}" method="POST">
            @csrf
            <?php 
                if(isset($horario)){
            ?>
            @method('PUT')
            <?php 
                }
            ?>
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
                        <option value="45" {{ isset($horario) && $horario->tiempo_clase === '45' ? 'selected' : '' }}>45
                            minutos</option>
                        <option value="60" {{ isset($horario) && $horario->tiempo_clase === '60' ? 'selected' : '' }}>60
                            minutos</option>
                        <option value="120" {{ isset($horario) && $horario->tiempo_clase === '120' ? 'selected' : '' }}>
                            120 minutos</option>
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
                        <div class="seleccion-horas d-none" id="contenedor-horas">
                            <div class="contenedor-seleccion">
                                <h2 id="inicioFin"></h2>
                                <div class="hora-minuto">
                                    <div class="contenedor-hora-minuto">
                                        <input placeholder="00" class="casillaReloj" type="number" min="1"
                                            max="24" id="horaProvisional">
                                        <div class="puntos">:</div>
                                        <input placeholder="00" class="casillaReloj" type="number" id="minutosProvisional"
                                            min="1" max="60">
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
                                    <input id="sliderHoras" type="range" id="horaMinuto" min="0"
                                        max="287" value="0">
                                </div>
                                <input class="botonSeleccion" id="seleccionarHora" type="button" value="Seleccionar">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="repeticion {{ isset($horario) ? 'd-none' : '' }}">
                    <div id="grupo-repeticion" class="grupo-input">
                        <label for="repetir">¿Quieres que esta clase se repita algun dia mas?</label>
                        <input class="boton-repetir" type="checkbox" name="repetir" id="repetir">Sí
                    </div>
                    <div class="grupo-input opcionRepetir position-relative top-0 start-0 mt-3">
                        <label for="numeroSemanas">¿Cuantas semanas quieres que se repita?</label>
                        <input id="input-repeticion-semamas" class="estilo-formulario" type="number"
                            name="numeroSemanas" value="0">
                        <hr class="mt-0 w-100 linea-transition-weigth border border-warning-subtle  border-1 ">

                        <ul class="fs-5 listaDiasSemana row row-cols-3">
                            <li>
                                <label for="lunes">Lunes</label>
                                <input type="checkbox" name="diasSemana[]" id="lunes" value="Monday">
                            </li>
                            <li>
                                <label for="martes">Martes</label>
                                <input type="checkbox" name="diasSemana[]" id="martes" value="Tuesday">
                            </li>
                            <li>
                                <label for="miercoles">Miércoles</label>
                                <input type="checkbox" name="diasSemana[]" id="miercoles" value="Wednesday">
                            </li>
                            <li>
                                <label for="jueves">Jueves</label>
                                <input type="checkbox" name="diasSemana[]" id="jueves" value="Thursday">
                            </li>
                            <li>
                                <label for="viernes">Viernes</label>
                                <input type="checkbox" name="diasSemana[]" id="viernes" value="Friday">
                            </li>
                            <li>
                                <label for="sabado">Sábado</label>
                                <input type="checkbox" name="diasSemana[]" id="sabado" value="Saturday">
                            </li>
                        </ul>
                    </div>
                </div>


            </div>

            <div class="botonEnviar mt-5">
                <input class="estilo-formulario estilo-formulario-enviar" type="submit"
                    value="{{ isset($horario) ? 'Editar registro' : 'Crear clase nueva' }}">
            </div>


        </form>
        @if (isset($horario))
            <form id="formulario-eliminar" action="{{ route('horario.destroy', ['horario' => $horario->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" id="input-eliminar" value="Eliminar">
            </form>
        @endif
    </div>

    <script>
        let valorHoraInicio = $('#horaInicio').val();
        let valorHoraFin = $('#horaFin').val();

        const horaInicio = $('.hora-inicio .hora');
        const minutoInicio = $('.hora-inicio .minutos');

        const horaFin = $('.hora-fin .hora');
        const minutoFin = $('.hora-fin .minutos');

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

        document.addEventListener('click', function(event) {
            const calendario = $('#contenedorCalendario');
            const reloj = $('#contenedor-horas');

            if (!calendario.get(0).contains(event.target) && !$('.contenedor-fecha-placeholder').get(0).contains(
                    event.target)) {
                calendario.addClass('d-none');
            }

            if (!reloj.get(0).contains(event.target) && !$('.horas').get(0).contains(event.target)) {
                reloj.addClass('d-none');
            }
        });
        $("#horaProvisional, #minutosProvisional").on("input", function() {
            let val = parseInt(this.value, 10);
            const id = this.id;

            if (isNaN(val)) {
                this.value = "";
                return;
            }

            if (id === "horaProvisional") {
                console.log('corrigiendo horas');
                if (val > 24) this.value = 24;
                else if (val < 1) this.value = 1;
            }

            if (id === "minutosProvisional") {
                console.log('corrigiendo minutos');

                if (val > 60) this.value = 60;
                else if (val < 1) this.value = 1;
            }
        });
    </script>
@endsection
