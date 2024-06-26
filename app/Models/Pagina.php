<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagina extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
    ];

    public function secciones() {
        return $this->hasMany(SeccionContenido::class, 'idSeccion');
    }
}
