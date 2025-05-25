<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = [
        'horario_id', 
        'alumno_id',            
    ];

    public function asistencias(){
        return $this->hasMany(Asistencia::class);
    }


    public function horario(){
        return $this->belongsTo(Horario::class, 'horario_id');
    }

    public function alumno(){
        return $this->belongsTo(User::class, 'alumno_id');
    }
}
