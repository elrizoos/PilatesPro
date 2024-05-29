<p class="p-2 fs-5 text-center">La página cuenta con tres tipos de usuarios, sin contar al invitado, actualmente en desarrollo los siguientes:</p>
<ul class="p-2 fs-5">
    <li class="p-2">
        <b class="fw-bold text-warning-emphasis">Admin:</b> El usuario admin puede realizar las siguientes funciones:
        <ul class="p-2">
            <li class="p-2">Dentro del apartado de "Usuarios":
                <ul class="p-2">
                    <li class="p-1">Crear un nuevo usuario mediante un formulario de creación.</li>
                    <li class="p-1">Editar un usuario existente que se muestra en una tabla con todos los usuarios.</li>
                    <li class="p-1">Cambiar las contraseñas del usuario elegido.</li>
                </ul>
            </li>
            <li class="p-2">Dentro del apartado de "Contenido":
                <ul class="p-2">
                    <li class="p-1">Crear una nueva página que aparecerá en un desplegable "Más" en la página de inicio.</li>
                    <li class="p-1">Crear una nueva sección, elegir la página donde añadir la sección y seleccionar entre cuatro estructuras de contenido la más adecuada.</li>
                    <li class="p-1">Establecer un orden al crear una sección y al editarla posteriormente.</li>
                    <li class="p-1">Editar el contenido de la sección y eliminar la sección de una página.</li>
                    <li class="p-1">Mostrar una galería con las fotos de perfil de los usuarios de la aplicación y las fotos de las secciones.</li>
                </ul>
            </li>
        </ul>
    </li>
    <li class="p-2">
        <b class="fw-bold text-warning-emphasis">Alumno:</b> El usuario alumno podrá realizar las siguientes funciones desarrolladas hasta el momento:
        <ul class="p-2">
            <li class="p-2">Cambiar su información personal.</li>
            <li class="p-2">Modificar su foto de perfil.</li>
            <li class="p-2">Ver el historial de reservas, incluyendo las activas actualmente y las disfrutadas anteriormente.</li>
            <li class="p-2">Ver las reservas actualmente activas para disfrutar en el futuro.</li>
            <li class="p-2">Recibir sugerencias de reservas en clases adecuadas al grupo al que pertenece el alumno.</li>
        </ul>
    </li>
</ul>
<span class="position-absolute top-0 end-0" id="cerrarVentanaActualizacion"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="red" class="bi bi-x" viewBox="0 0 16 16">
  <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
</svg></span>

<script>
    $('#cerrarVentanaActualizacion').on('click', function() {
        $('#cuadroActualizacion').hide();
    })
</script>
