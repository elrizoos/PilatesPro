<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $reserva_id
 * @property string $fecha
 * @property int $asistio
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Reserva $reserva
 * @method static \Illuminate\Database\Eloquent\Builder|Asistencia newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Asistencia newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Asistencia query()
 * @method static \Illuminate\Database\Eloquent\Builder|Asistencia whereAsistio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asistencia whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asistencia whereFecha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asistencia whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asistencia whereReservaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asistencia whereUpdatedAt($value)
 */
	class Asistencia extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $nombre
 * @property int $grupo_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Grupo $grupo
 * @property-read \App\Models\User|null $profesor
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Reserva> $reservas
 * @property-read int|null $reservas_count
 * @method static \Illuminate\Database\Eloquent\Builder|Clase newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Clase newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Clase query()
 * @method static \Illuminate\Database\Eloquent\Builder|Clase whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clase whereGrupoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clase whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clase whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clase whereUpdatedAt($value)
 */
	class Clase extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_one_id
 * @property int $user_two_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Mensaje> $messages
 * @property-read int|null $messages_count
 * @property-read \App\Models\User $userOne
 * @property-read \App\Models\User $userTwo
 * @method static \Illuminate\Database\Eloquent\Builder|Conversacione newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Conversacione newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Conversacione query()
 * @method static \Illuminate\Database\Eloquent\Builder|Conversacione whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Conversacione whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Conversacione whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Conversacione whereUserOneId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Conversacione whereUserTwoId($value)
 */
	class Conversacione extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $fecha_emision
 * @property string $monto_total
 * @property string $stripe_id
 * @property int $alumno_id
 * @property string $pdf
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $alumno
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\FacturaDetalle> $detalles
 * @property-read int|null $detalles_count
 * @method static \Illuminate\Database\Eloquent\Builder|Factura newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Factura newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Factura query()
 * @method static \Illuminate\Database\Eloquent\Builder|Factura whereAlumnoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Factura whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Factura whereFechaEmision($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Factura whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Factura whereMontoTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Factura wherePdf($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Factura whereStripeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Factura whereUpdatedAt($value)
 */
	class Factura extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @method static \Illuminate\Database\Eloquent\Builder|FacturaDetalle newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FacturaDetalle newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FacturaDetalle query()
 */
	class FacturaDetalle extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $nombre
 * @property string|null $descripcion
 * @property int $profesor_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Clase> $clases
 * @property-read int|null $clases_count
 * @property-read \App\Models\User $profesor
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $usuarios
 * @property-read int|null $usuarios_count
 * @method static \Illuminate\Database\Eloquent\Builder|Grupo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Grupo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Grupo query()
 * @method static \Illuminate\Database\Eloquent\Builder|Grupo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grupo whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grupo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grupo whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grupo whereProfesorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Grupo whereUpdatedAt($value)
 */
	class Grupo extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $clase_id
 * @property string|null $dia_semana
 * @property string|null $fecha_especifica
 * @property string $hora_inicio
 * @property string $hora_fin
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $tiempo_clase
 * @property-read \App\Models\Clase $clase
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Reserva> $reserva
 * @property-read int|null $reserva_count
 * @method static \Illuminate\Database\Eloquent\Builder|Horario newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Horario newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Horario query()
 * @method static \Illuminate\Database\Eloquent\Builder|Horario whereClaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Horario whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Horario whereDiaSemana($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Horario whereFechaEspecifica($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Horario whereHoraFin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Horario whereHoraInicio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Horario whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Horario whereTiempoClase($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Horario whereUpdatedAt($value)
 */
	class Horario extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $usuario_id
 * @property string $ruta_imagen
 * @property string|null $descripcion
 * @property string|null $hash
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Imagen newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Imagen newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Imagen query()
 * @method static \Illuminate\Database\Eloquent\Builder|Imagen whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Imagen whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Imagen whereHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Imagen whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Imagen whereRutaImagen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Imagen whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Imagen whereUsuarioId($value)
 */
	class Imagen extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $ruta_imagen
 * @property string|null $descripcion
 * @property string|null $hash
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\SeccionContenido|null $contenido
 * @method static \Illuminate\Database\Eloquent\Builder|ImagenesSeccion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ImagenesSeccion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ImagenesSeccion query()
 * @method static \Illuminate\Database\Eloquent\Builder|ImagenesSeccion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ImagenesSeccion whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ImagenesSeccion whereHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ImagenesSeccion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ImagenesSeccion whereRutaImagen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ImagenesSeccion whereUpdatedAt($value)
 */
	class ImagenesSeccion extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $producto_id
 * @property int|null $numero_clases
 * @property string|null $tiempo_clase
 * @property int|null $tiempo_validez
 * @property int|null $descuento
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Producto $producto
 * @method static \Illuminate\Database\Eloquent\Builder|InfoPaquete newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InfoPaquete newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InfoPaquete query()
 * @method static \Illuminate\Database\Eloquent\Builder|InfoPaquete whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InfoPaquete whereDescuento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InfoPaquete whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InfoPaquete whereNumeroClases($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InfoPaquete whereProductoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InfoPaquete whereTiempoClase($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InfoPaquete whereTiempoValidez($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InfoPaquete whereUpdatedAt($value)
 */
	class InfoPaquete extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $producto_id
 * @property int|null $clases_semanales
 * @property string|null $tiempo_clase
 * @property string|null $asesoramiento
 * @property int|null $dias_cancelacion
 * @property int $beneficios
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Producto $producto
 * @method static \Illuminate\Database\Eloquent\Builder|InfoSuscripcione newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InfoSuscripcione newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|InfoSuscripcione query()
 * @method static \Illuminate\Database\Eloquent\Builder|InfoSuscripcione whereAsesoramiento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InfoSuscripcione whereBeneficios($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InfoSuscripcione whereClasesSemanales($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InfoSuscripcione whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InfoSuscripcione whereDiasCancelacion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InfoSuscripcione whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InfoSuscripcione whereProductoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InfoSuscripcione whereTiempoClase($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InfoSuscripcione whereUpdatedAt($value)
 */
	class InfoSuscripcione extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $conversation_id
 * @property int $user_id
 * @property string $body
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Conversacione $conversation
 * @property-read \App\Models\MensajesVisto|null $mensajesVistos
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Mensaje newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mensaje newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mensaje query()
 * @method static \Illuminate\Database\Eloquent\Builder|Mensaje whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mensaje whereConversationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mensaje whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mensaje whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mensaje whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mensaje whereUserId($value)
 */
	class Mensaje extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property int $mensaje_id
 * @property int $mensajeVisto
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Mensaje|null $mensaje
 * @method static \Illuminate\Database\Eloquent\Builder|MensajesVisto newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MensajesVisto newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MensajesVisto query()
 * @method static \Illuminate\Database\Eloquent\Builder|MensajesVisto whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MensajesVisto whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MensajesVisto whereMensajeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MensajesVisto whereMensajeVisto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MensajesVisto whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MensajesVisto whereUserId($value)
 */
	class MensajesVisto extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string $method
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $pregunta
 * @property string|null $respuesta
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|MetodosRecuperacione newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MetodosRecuperacione newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MetodosRecuperacione query()
 * @method static \Illuminate\Database\Eloquent\Builder|MetodosRecuperacione whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MetodosRecuperacione whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MetodosRecuperacione whereMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MetodosRecuperacione wherePregunta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MetodosRecuperacione whereRespuesta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MetodosRecuperacione whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MetodosRecuperacione whereUserId($value)
 */
	class MetodosRecuperacione extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $tipo
 * @property string $titulo
 * @property string $descripcion
 * @property string $mensaje
 * @property int $importante
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Notificacione newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notificacione newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notificacione query()
 * @method static \Illuminate\Database\Eloquent\Builder|Notificacione whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notificacione whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notificacione whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notificacione whereImportante($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notificacione whereMensaje($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notificacione whereTipo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notificacione whereTitulo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notificacione whereUpdatedAt($value)
 */
	class Notificacione extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|NotificacionesUsuario newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NotificacionesUsuario newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NotificacionesUsuario query()
 * @method static \Illuminate\Database\Eloquent\Builder|NotificacionesUsuario whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificacionesUsuario whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificacionesUsuario whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificacionesUsuario whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificacionesUsuario whereUserId($value)
 */
	class NotificacionesUsuario extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $titulo
 * @property string $descripcion
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SeccionContenido> $secciones
 * @property-read int|null $secciones_count
 * @method static \Illuminate\Database\Eloquent\Builder|Pagina newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pagina newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pagina query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pagina whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pagina whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pagina whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pagina whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pagina whereTitulo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pagina whereUpdatedAt($value)
 */
	class Pagina extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \App\Models\User|null $alumno
 * @method static \Illuminate\Database\Eloquent\Builder|Pago newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pago newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pago query()
 */
	class Pago extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Panel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Panel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Panel query()
 */
	class Panel extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property int $producto_id
 * @property string $fecha_compra
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $payment_method_id
 * @property-read \App\Models\Producto $producto
 * @method static \Illuminate\Database\Eloquent\Builder|PaqueteUsuario newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaqueteUsuario newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaqueteUsuario query()
 * @method static \Illuminate\Database\Eloquent\Builder|PaqueteUsuario whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaqueteUsuario whereFechaCompra($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaqueteUsuario whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaqueteUsuario wherePaymentMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaqueteUsuario whereProductoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaqueteUsuario whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaqueteUsuario whereUserId($value)
 */
	class PaqueteUsuario extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $stripe_id
 * @property string $name
 * @property string $description
 * @property string $type
 * @property string $precio
 * @property string $precio_stripe_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\InfoPaquete|null $infoPaquete
 * @property-read \App\Models\InfoSuscripcione|null $infoSuscripcion
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\PaqueteUsuario> $paquete
 * @property-read int|null $paquete_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Subscription> $subscription
 * @property-read int|null $subscription_count
 * @method static \Illuminate\Database\Eloquent\Builder|Producto newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Producto newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Producto query()
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto wherePrecio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto wherePrecioStripeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereStripeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Producto whereUpdatedAt($value)
 */
	class Producto extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property int $clases_totales
 * @property int $clases_45
 * @property int $clases_60
 * @property int $clases_120
 * @property int $minutos_totales
 * @property int $clases_disfrutadas
 * @property int $tiempo_disfrutado
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|RegistroTiempo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RegistroTiempo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RegistroTiempo query()
 * @method static \Illuminate\Database\Eloquent\Builder|RegistroTiempo whereClases120($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegistroTiempo whereClases45($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegistroTiempo whereClases60($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegistroTiempo whereClasesDisfrutadas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegistroTiempo whereClasesTotales($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegistroTiempo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegistroTiempo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegistroTiempo whereMinutosTotales($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegistroTiempo whereTiempoDisfrutado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegistroTiempo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegistroTiempo whereUserId($value)
 */
	class RegistroTiempo extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $horario_id
 * @property int $alumno_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $alumno
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Asistencia> $asistencias
 * @property-read int|null $asistencias_count
 * @property-read \App\Models\Horario $horario
 * @method static \Illuminate\Database\Eloquent\Builder|Reserva newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reserva newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reserva query()
 * @method static \Illuminate\Database\Eloquent\Builder|Reserva whereAlumnoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reserva whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reserva whereHorarioId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reserva whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reserva whereUpdatedAt($value)
 */
	class Reserva extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $titulo
 * @property string $tipo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\SeccionContenido|null $contenido
 * @method static \Illuminate\Database\Eloquent\Builder|Seccion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Seccion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Seccion query()
 * @method static \Illuminate\Database\Eloquent\Builder|Seccion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seccion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seccion whereTipo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seccion whereTitulo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Seccion whereUpdatedAt($value)
 */
	class Seccion extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $idSeccion
 * @property string $titulo
 * @property string $parrafo
 * @property int|null $orden
 * @property int|null $idImagenUno
 * @property int|null $idImagenDos
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $idPagina
 * @property-read \App\Models\ImagenesSeccion|null $imagenDos
 * @property-read \App\Models\ImagenesSeccion|null $imagenUno
 * @property-read \App\Models\Pagina $pagina
 * @property-read \App\Models\Seccion $seccion
 * @method static \Illuminate\Database\Eloquent\Builder|SeccionContenido newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SeccionContenido newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SeccionContenido query()
 * @method static \Illuminate\Database\Eloquent\Builder|SeccionContenido whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SeccionContenido whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SeccionContenido whereIdImagenDos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SeccionContenido whereIdImagenUno($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SeccionContenido whereIdPagina($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SeccionContenido whereIdSeccion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SeccionContenido whereOrden($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SeccionContenido whereParrafo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SeccionContenido whereTitulo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SeccionContenido whereUpdatedAt($value)
 */
	class SeccionContenido extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $stripe_id
 * @property string $stripe_status
 * @property string|null $stripe_price
 * @property int|null $quantity
 * @property string|null $trial_ends_at
 * @property string|null $ends_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $producto_id
 * @property-read \App\Models\Producto $product
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription query()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereEndsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereProductoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereStripeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereStripePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereStripeStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereTrialEndsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereUserId($value)
 */
	class Subscription extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $nombre
 * @property string $apellidos
 * @property string $dni
 * @property string $telefono
 * @property string $email
 * @property string|null $direccion
 * @property string $fecha_nacimiento
 * @property mixed $password
 * @property string|null $remember_token
 * @property string $tipo_usuario
 * @property int $premium
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $stripe_id
 * @property string|null $pm_type
 * @property string|null $pm_last_four
 * @property string|null $trial_ends_at
 * @property int|null $grupo_id
 * @property int|null $registro_clases_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Clase> $clases
 * @property-read int|null $clases_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Factura> $facturas
 * @property-read int|null $facturas_count
 * @property-read mixed $ruta_imagen
 * @property-read \App\Models\Grupo|null $grupo
 * @property-read \App\Models\Imagen|null $imagen
 * @property-read \App\Models\MetodosRecuperacione|null $metodosRecuperacion
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Pago> $pagos
 * @property-read int|null $pagos_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Producto> $productos
 * @property-read int|null $productos_count
 * @property-read \App\Models\RegistroTiempo|null $registroTiempo
 * @property-read \App\Models\Reserva|null $reserva
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Cashier\Subscription> $subscriptions
 * @property-read int|null $subscriptions_count
 * @property-read \App\Models\Subscription|null $suscripcion
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|User hasExpiredGenericTrial()
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User onGenericTrial()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereApellidos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDireccion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDni($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFechaNacimiento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereGrupoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePmLastFour($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePmType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePremium($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRegistroClasesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStripeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTelefono($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTipoUsuario($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTrialEndsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

