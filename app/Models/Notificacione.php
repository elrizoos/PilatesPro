<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notificacione extends Model
{
    use HasFactory;
protected $fillable = ['tipo', 'titulo', 'descripcion', 'mensaje', 'importante'];

}
