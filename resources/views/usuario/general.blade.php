<div class="botonera">
    <ul>
        <li class="contenido-cargable-interno" id="informacionGeneral" data-url="{{ route('general-informacion') }}">
            Información de usuario</li>
        <li class="contenido-cargable-interno" id="informacionContacto"
            data-url="{{ route('general-informacion-contacto') }}">Información de contacto</li>
        <li class="contenido-cargable-interno" id="fotoPerfil" data-url="{{ route('general-fotoPerfil') }}">Foto de perfil
        </li>
        <li class="contenido-cargable-interno" id="preferenciasIdioma"
            data-url="{{ route('general-preferenciasIdioma') }}">Preferencias de idioma</li>
    </ul>
</div>

<div class="alert alert-danger no-active" id="mensaje-error-fotoPerfil"></div>

<div class="contenido-dinamico-interno" id="contenido-dinamico-interno">

</div>
