<p>La página cuenta con tres tipos de usuarios, sin contar al invitado, actualmente en desarrollo los siguientes:</p>
<ul class="lista-cambios">
    <li class="cambio cambio-principal">
        <b>Admin:</b> El usuario admin puede realizar las siguientes funciones:
        <ul class="lista-principal">
            <li class="apartado-principal">Dentro del apartado de "Usuarios":
                <ul>
                    <li class="subapartado">Crear un nuevo usuario mediante un formulario de creación.</li>
                    <li class="subapartado">Editar un usuario existente que se muestra en una tabla con todos los usuarios.</li>
                    <li class="subapartado">Cambiar las contraseñas del usuario elegido.</li>
                </ul>
            </li>
            <li class="apartado-principal">Dentro del apartado de "Contenido":
                <ul>
                    <li class="subapartado">Crear una nueva página que aparecerá en un desplegable "Más" en la página de inicio.</li>
                    <li class="subapartado">Crear una nueva sección, elegir la página donde añadir la sección y seleccionar entre cuatro estructuras de contenido la más adecuada.</li>
                    <li class="subapartado">Establecer un orden al crear una sección y al editarla posteriormente.</li>
                    <li class="subapartado">Editar el contenido de la sección y eliminar la sección de una página.</li>
                    <li class="subapartado">Mostrar una galería con las fotos de perfil de los usuarios de la aplicación y las fotos de las secciones.</li>
                </ul>
            </li>
            <li class="apartado-principal">Dentro del apartado de "Clases y Horarios":
                <ul>
                    <li class="subapartado">Gestionar clases y horarios, estableciendo registros horarios.</li>
                </ul>
            </li>
            <li class="apartado-principal">Dentro del apartado de "Productos":
                <ul>
                    <li class="subapartado">Gestionar productos, tanto paquetes de clases como suscripciones mensuales.</li>
                </ul>
            </li>
        </ul>
    </li>
    <li class="cambio cambio-principal">
        <b>Alumno:</b> El usuario alumno podrá realizar las siguientes funciones desarrolladas hasta el momento:
        <ul class="lista-principal">
            <li class="apartado-principal">Cambiar su información personal.</li>
            <li class="apartado-principal">Modificar su foto de perfil.</li>
            <li class="apartado-principal">Ver el historial de reservas, incluyendo las activas actualmente y las disfrutadas anteriormente.</li>
            <li class="apartado-principal">Ver las reservas actualmente activas para disfrutar en el futuro.</li>
            <li class="apartado-principal">Recibir sugerencias de reservas en clases adecuadas al grupo al que pertenece el alumno.</li>
            <li class="apartado-principal">Realizar y cambiar su suscripción directamente desde su perfil.</li>
        </ul>
    </li>
</ul>
<span id="cerrarVentanaActualizacion"></span>

<script>
    $('#cerrarVentanaActualizacion').on('click', function() {
        $('#cuadroActualizacion').hide();
    })
</script>
