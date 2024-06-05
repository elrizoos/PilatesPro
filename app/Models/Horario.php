<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    protected $fillable = [
        'clase_id',
        'dia_semana',
        'fecha_especifica',
        'hora_inicio',
        'hora_fin',

    ];
    public function clase()
    {
        return $this->belongsTo(Clase::class, 'clase_id');
    }
}
