<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    use HasFactory;
    protected $fillable = ['usuario_id', 'ruta_imagen', 'descripcion', 'hash'];
    protected $table = 'imagenes';
    public function user() {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
