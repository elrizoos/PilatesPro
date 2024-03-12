<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;

    public function clase() {
        return $this->hasMany(Clase::class);
    }

    public function profesor() {
        return $this->belongsTo(User::class);
    }
}
