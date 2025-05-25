<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoSuscripcione extends Model
{
    use HasFactory;
    protected $fillable = [
        'producto_id',
        'clases_semanales',
        'tiempo_clase',
        'asesoramiento',
        'dias_cancelacion',
        'beneficios',
        
    ];
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}
