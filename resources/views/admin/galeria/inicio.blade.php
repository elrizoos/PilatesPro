@extends('admin/panel-control')

@section('galeria-inicio')
    <div class="container-fluid w-100 h-100 overflow-auto">
        <div class="row">
            <div class="col">
                <ul class="fs-5 nav nav-tabs justify-content-center align-items-center position-fixed" id="tabImagenes" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="fs-5 nav-link" href="" id="perfil-tab" data-bs-toggle="tab"
                            data-bs-target="#imagenes-perfil" role="tab" aria-controls="imagenes-perfil"
                            aria-selected="false">Perfil Usuarios</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="fs-5 nav-link" href="" id="seccion-tab" data-bs-toggle="tab"
                            data-bs-target="#imagenes-seccion" role="tab" aria-controls="imagenes-seccion"
                            aria-selected="false">Secciones</a>
                    </li>
                </ul>
                <div class="tab-content w-100 h-100" id="tabImagenesContent">
                    <div class="tab-pane fade container-fluid p-4" id="imagenes-perfil" role="tabpanel"
                        aria-labelledby="imagenes-perfil" tabindex="0">
                        <h2 id="tituloImagenesPerfil" class="w-100 text-center text-black">Imágenes de Perfil</h2>
                        <div class=" row row-cols-3" id="galeriaPerfil">
                            @foreach ($imagenesPerfil as $imagen)
                                <div class="col d-flex justify-content-center align-items-center p-4">
                                    <img class="imagen img-fluid w-75 h-auto border border-1"
                                        src="{{ asset('storage/' . $imagen->ruta_imagen) }}" alt="Imagen de perfil">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade container-fluid p-4" id="imagenes-seccion" role="tabpanel"
                        aria-labelledby="imagenes-seccion" tabindex="0">
                        <h2 id="tituloImagenesSeccion" class="w-100 text-center text-black">Imágenes de Sección</h2>
                        <div class=" row row-cols-3" id="galeriaSeccion">
                            @foreach ($imagenesSeccion as $imagen)
                                <div class="col d-flex justify-content-center align-items-center p-4">
                                    <img class="imagen img-fluid w-75 h-auto border border-1 rounded-5"
                                        src="{{ asset('storage/' . $imagen->ruta_imagen) }}" alt="Imagen de sección">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script></script>
@endsection
