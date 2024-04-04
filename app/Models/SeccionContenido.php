<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeccionContenido extends Model
{
    use HasFactory;
    public function seccion()
    {
        return $this->belongsTo(Seccion::class, 'idSeccion');
    }

    public function imagenes()
    {
        return $this->hasMany(ImagenesSeccion::class, 'idContenido');
    }
}
