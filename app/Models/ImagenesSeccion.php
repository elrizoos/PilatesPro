<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagenesSeccion extends Model
{
    use HasFactory;

    protected $fillable = [
        'ruta_imagen',
        'descripcion',
        'hash',
    ];
    public function contenido()
    {
        return $this->belongsTo(SeccionContenido::class, 'id');
    }
}
