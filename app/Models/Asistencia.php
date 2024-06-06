<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    use HasFactory;

    protected $fillable = [
        'reserva_id',
        'fecha',
        'asistio',
    ];

    public function reserva() {
        return $this->belongsTo(Reserva::class);
    }
}
