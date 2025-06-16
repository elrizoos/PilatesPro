{{-- resources/views/seguimiento-alumno.blade.php --}}

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Seguimiento de Alumno - PilatesPro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8f9fa;
            margin: 20px;
            color: #333;
        }
        .container {
            max-width: 900px;
            background: #fff;
            padding: 20px 30px;
            margin: auto;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        h1, h2 {
            color: #2c3e50;
        }
        section {
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 1px solid #ddd;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 8px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px 12px;
            text-align: left;
        }
        th {
            background: #2980b9;
            color: white;
        }
        .note {
            background: #eef6fb;
            border-left: 4px solid #2980b9;
            padding: 10px 15px;
            margin-top: 10px;
            font-style: italic;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Seguimiento de Alumno</h1>

        {{-- Datos básicos --}}
        <section>
            <h2>Datos Básicos</h2>
            <p><strong>Nombre:</strong> María López</p>
            <p><strong>Edad:</strong> 34 años</p>
            <p><strong>Género:</strong> Femenino</p>
            <p><strong>Fecha de inscripción:</strong> 15 de enero de 2024</p>
            <p><strong>Estado:</strong> Activo</p>
        </section>

        {{-- Historial de clases --}}
        <section>
            <h2>Historial de Clases</h2>
            <table>
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Tipo de Clase</th>
                        <th>Asistencia</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>05/06/2025</td><td>Pilates Suelo</td><td>Asistió</td></tr>
                    <tr><td>07/06/2025</td><td>Pilates Máquina</td><td>No asistió</td></tr>
                    <tr><td>10/06/2025</td><td>Pilates Suelo</td><td>Asistió</td></tr>
                </tbody>
            </table>
            <p><strong>Total clases realizadas:</strong> 45</p>
            <p><strong>Clases pendientes:</strong> 5</p>
        </section>

        {{-- Objetivos personalizados --}}
        <section>
            <h2>Objetivos Personalizados</h2>
            <ul>
                <li>Mejorar flexibilidad en espalda baja</li>
                <li>Recuperación tras lesión de rodilla</li>
                <li>Tonificación general</li>
            </ul>
            <div class="note">
                Progreso: Ha mejorado notablemente en flexibilidad y movilidad de rodilla.
            </div>
        </section>

        {{-- Evaluaciones físicas --}}
        <section>
            <h2>Evaluaciones Físicas</h2>
            <table>
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Prueba</th>
                        <th>Resultado</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>15/01/2024</td><td>Flexibilidad espalda</td><td>Limitada</td></tr>
                    <tr><td>15/01/2024</td><td>Fuerza abdominal</td><td>Moderada</td></tr>
                    <tr><td>01/06/2025</td><td>Flexibilidad espalda</td><td>Buena</td></tr>
                    <tr><td>01/06/2025</td><td>Fuerza abdominal</td><td>Buena</td></tr>
                </tbody>
            </table>
        </section>

        {{-- Plan de entrenamiento --}}
        <section>
            <h2>Plan de Entrenamiento</h2>
            <p>Rutina personalizada 3 veces por semana, combinando Pilates Suelo y Máquina.</p>
            <p>Notas del instructor: Foco en ejercicios de estabilización y fortalecimiento de core.</p>
        </section>

        {{-- Notas e incidencias --}}
        <section>
            <h2>Notas e Incidencias</h2>
            <ul>
                <li>15/05/2025: Reporta dolor leve en rodilla derecha tras clase.</li>
                <li>22/05/2025: Mejoría notable tras ajuste de rutina.</li>
            </ul>
        </section>

        {{-- Pagos y facturación --}}
        <section>
            <h2>Pagos y Facturación</h2>
            <table>
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Concepto</th>
                        <th>Monto</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>01/05/2025</td><td>Mensualidad Mayo</td><td>40 €</td><td>Pagado</td></tr>
                    <tr><td>01/06/2025</td><td>Mensualidad Junio</td><td>40 €</td><td>Pendiente</td></tr>
                </tbody>
            </table>
        </section>

        {{-- Recordatorios y notificaciones --}}
        <section>
            <h2>Recordatorios y Notificaciones</h2>
            <ul>
                <li>Renovar suscripción antes del 30 de junio.</li>
                <li>Evaluación física programada para 01/07/2025.</li>
            </ul>
        </section>

        {{-- Documentos o recursos --}}
        <section>
            <h2>Documentos y Recursos</h2>
            <ul>
                <li><a href="#">Video rutina de fortalecimiento - mayo 2025</a></li>
                <li><a href="#">Guía de ejercicios para casa</a></li>
            </ul>
        </section>

        {{-- Comunicación directa --}}
        <section>
            <h2>Comunicación con Instructor</h2>
            <p>No hay mensajes nuevos.</p>
        </section>
    </div>
</body>
</html>
