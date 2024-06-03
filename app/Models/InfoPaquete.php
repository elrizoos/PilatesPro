<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoPaquete extends Model
{
    use HasFactory;

    protected $fillable = [
        'producto_id',
        'numero_clases',
        'tiempo_clase',
        'tiempo_validez'
    ];
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}
