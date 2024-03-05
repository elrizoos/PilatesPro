<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    use HasFactory;

    public function profesor() {
        return $this->belongsTo(User::class);
    }

    public function grupo() {
        return $this->belongsTo(Grupo::class);
    }

    public function reserva() {
        return $this->hasOne(Reserva::class);
    }
}
