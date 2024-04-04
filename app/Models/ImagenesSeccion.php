<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagenesSeccion extends Model
{
    use HasFactory;
    public function contenido()
    {
        return $this->belongsTo(SeccionContenido::class, 'idContenido');
    }
}
