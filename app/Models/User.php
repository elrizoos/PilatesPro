<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Imagen;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
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
        'grupo_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];

    public function imagen()
    {
        return $this->hasOne(Imagen::class, 'usuario_id');
    }


    public function grupo() {
        return $this->hasOne(Grupo::class);
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
        return $this->hasMany(Factura::class);
    }

    public function membresias()
    {
        return $this->belongsToMany(Membresia::class)
            ->withPivot('subscription_id', 'status')
            ->withTimestamps();
    }
}
