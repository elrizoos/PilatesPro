@component('mail::message')
# <span style="color: #2c3e50; font-family: Arial, sans-serif;">¡Hola!</span>

<p style="font-size: 18px; color: #34495e; font-family: Arial, sans-serif; font-weight: bold;">
    {{ $details['titulo'] }}
</p>

<p style="font-size: 16px; color: #555555; font-family: Arial, sans-serif; line-height: 1.4;">
    {{ $details['descripcion'] }}
</p>

<p style="font-size: 16px; color: #555555; font-family: Arial, sans-serif; line-height: 1.4;">
    {{ $details['mensaje'] }}
</p>

<p style="font-size: 16px; font-style: italic; color: #7f8c8d; font-family: Arial, sans-serif;">
    Este es un mensaje personalizado para ti.
</p>

<p style="font-size: 16px; font-weight: bold; color: #2980b9; font-family: Arial, sans-serif;">
    ¡Gracias por confiar en PilatesPro!
</p>

<p style="font-size: 14px; color: #95a5a6; font-family: Arial, sans-serif;">
    Saludos,<br>
    El equipo de PilatesPro
</p>
@endcomponent
