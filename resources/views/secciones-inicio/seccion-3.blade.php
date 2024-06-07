<div class="row vh-100">
    <div class="col w-100 vh-100 g-0">
        <div class="w-100 vh-100 bg-color-fondo-claro p-5 border-bottom border-1 border-dorado-claro">
            <div class="row pb-4">
                <h2 class="fs-2 texto-color-resalte">Chus Alvarez Pilates</h2>
                <h3 class="fs-3 texto-color-titulo">Cursos por nivel de experiencia</h3>
            </div>
            <div class="row h-75 fs-4 gap-5">
                <div class="row h-50  row-cols-2">
                    @php
                        $contador = 0;
                    @endphp
                    @foreach ($suscripciones as $suscripcion)
                        @if ($contador > 5)
                            @php
                                break;
                            @endphp
                        @endif
                        @php
                            $contador++;
                        @endphp
                        <div
                            class="col p-3 h-100 position-relative overflow-hidden text-center transition-up texto-color-resalte d-flex justify-content-center align-items-center">
                            <img class="mw-100 h-auto img-fluid" src="{{ asset('imagenes/P9270200.jpg') }}"
                                alt="Primera imagen">
                            <div
                                class="bg-color-fondo-oscuro-transparente position-absolute top-0 left-0 w-100 h-100 transition-up z-2">
                                <div class="position-absolute top-40 transition-up-from-bottom p-3 w-100 h-100 start-0">
                                    <div class="p-3 d-flex flex-column gap-3 text-uppercase texto-color-gris">
                                        <p>{{ $suscripcion->precio }}€ / mes</p>
                                        <p>{{ $suscripcion->name }}</p>
                                    </div>
                                    <hr class="border border-light border-2 opacity-75">
                                    <div class="p-2 d-flex flex-row justify-content-between align-items-center">
                                        <div
                                            class="mh-100 d-flex flex-row gap-1 justify-content-center align-items-center">
                                            <svg class="icon icono-normal">
                                                <use xlink:href="#pilates" />
                                            </svg>
                                            <svg class="icon icono-normal">
                                                <use xlink:href="#pelota-de-pilates" />
                                            </svg>
                                            <svg class="icon icono-normal">
                                                <use xlink:href="#pilates-1" />
                                            </svg>
                                        </div>
                                        @php
                                            $url = '';

                                            if ($usuario !== null) {
                                                if ($usuario->tipo_usuario == 'Admin') {
                                                    $url = route('productos.edit', [
                                                        'producto' => $suscripcion->id,
                                                        'tipo' => 'suscripcion',
                                                    ]);
                                                } elseif ($usuario->tipo_usuario == 'Alumno') {
                                                    $url = route('suscripcion-estadoSuscripcion');
                                                }
                                            } else {
                                                $url = route('mostrarDetallesProducto', [
                                                    'producto' => $suscripcion->id,
                                                ]);
                                            }
                                        @endphp
                                        <div class="d-flex flex-row gap-1 justify-content-center align-items-center">
                                            @if ($usuario !== null)
                                                @if ($usuario->tipo_usuario == 'Admin')
                                                    <form action="{{ $url }}" method="POST"
                                                        class="d-flex align-items-center">
                                                        @csrf
                                                        @method('POST')
                                                        <button type="submit"
                                                            class="btn btn-link text-uppercase text-nowrap fw-bold fs-5 p-0 m-0 border-0 bg-transparent">
                                                            Más detalles
                                                            <svg class="icon icono-normal">
                                                                <use xlink:href="#flecha-recta" />
                                                            </svg>
                                                        </button>
                                                    </form>
                                                @endif
                                            @else
                                                <a href="{{ $url }}"
                                                    class="text-uppercase text-nowrap fw-bold fs-5 d-flex align-items-center">
                                                    Más detalles
                                                    <svg class="icon icono-normal">
                                                        <use xlink:href="#flecha-recta" />
                                                    </svg>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @if ($contadorSuscripciones > 5)
                        <button>Mostrar mas suscripciones</button>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
