<p>La página cuenta con tres tipos de usuarios, sin contar al invitado, actualmente en desarrollo los siguientes:</p>
<ul>
    <li>
        <b>Admin:</b> El usuario admin puede realizar las siguientes funciones:
        <ul>
            <li>Dentro del apartado de "Usuarios":
                <ul>
                    <li>Crear un nuevo usuario mediante un formulario de creación.</li>
                    <li>Editar un usuario existente que se muestra en una tabla con todos los usuarios.</li>
                    <li>Cambiar las contraseñas del usuario elegido.</li>
                </ul>
            </li>
            <li>Dentro del apartado de "Contenido":
                <ul>
                    <li>Crear una nueva página que aparecerá en un desplegable "Más" en la página de inicio.</li>
                    <li>Crear una nueva sección, elegir la página donde añadir la sección y seleccionar entre cuatro estructuras de contenido la más adecuada.</li>
                    <li>Establecer un orden al crear una sección y al editarla posteriormente.</li>
                    <li>Editar el contenido de la sección y eliminar la sección de una página.</li>
                    <li>Mostrar una galería con las fotos de perfil de los usuarios de la aplicación y las fotos de las secciones.</li>
                </ul>
            </li>
        </ul>
    </li>
    <li>
        <b>Alumno:</b> El usuario alumno podrá realizar las siguientes funciones desarrolladas hasta el momento:
        <ul>
            <li>Cambiar su información personal.</li>
            <li>Modificar su foto de perfil.</li>
            <li>Ver el historial de reservas, incluyendo las activas actualmente y las disfrutadas anteriormente.</li>
            <li>Ver las reservas actualmente activas para disfrutar en el futuro.</li>
            <li>Recibir sugerencias de reservas en clases adecuadas al grupo al que pertenece el alumno.</li>
        </ul>
    </li>
</ul>
<span id="cerrarVentanaActualizacion"></span>

<script>
    $('#cerrarVentanaActualizacion').on('click', function() {
        $('#cuadroActualizacion').hide();
    })
</script>
