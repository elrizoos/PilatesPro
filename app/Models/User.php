<?php

namespace App\Models;

use App\Notifications\ResetPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use Billable, HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'nombre',
        'apellidos',
        'dni',
        'telefono',
        'email',
        'direccion',
        'fecha_nacimiento',
        'password',
        'tipo_usuario',
        'especializacion',
        'grupo_id',
        'numero_clases',
        'registro_clases',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    public function imagen()
    {
        return $this->hasOne(Imagen::class, 'usuario_id');
    }

    public function clases()
    {
        return $this->hasMany(Clase::class, 'profesor_id');
    }

    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'grupo_id');
    }

    public function getRutaImagenAttribute()
    {
        return $this->imagen ? $this->imagen->ruta_imagen : 'ruta/a/imagen/por/defecto.png';
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class);
    }

    public function facturas()
    {
        return $this->hasMany(Factura::class, 'alumno_id');
    }

    public function productos()
    {
        return $this->hasMany(Producto::class);
    }

    public function suscripcion()
    {
        return $this->hasOne(Subscription::class);
    }

    public function registroTiempo()
    {
        return $this->hasOne(RegistroTiempo::class, 'user_id');
    }

    public function reserva()
    {
        return $this->hasOne(Reserva::class, 'alumno_id');
    }

    public function metodosRecuperacion()
    {
        return $this->hasOne(MetodosRecuperacione::class);
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    

    public function esAlumno()
    {
        return $this->tipo_usuario === 'alumno'; 
    }
}
