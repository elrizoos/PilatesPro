<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = [
        'stripe_id',
        'name',
        'description',
        'type',
        'precio',
        'quantity',
        'precio_stripe_id',
    ];
    public function subscription()
    {
        return $this->hasMany(Subscription::class);
    }

    public function infoPaquete()
    {
        return $this->hasOne(InfoPaquete::class, 'producto_id');
    }

    public function infoSuscripcion()
    {
        return $this->hasOne(InfoSuscripcione::class, 'producto_id');
    }
}
