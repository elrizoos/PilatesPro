<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    public function asistencias(){
        return $this->hasMany(Asistencia::class);
    }

    public function clase(){
        return $this->belongsTo(Clase::class);
    }
}
