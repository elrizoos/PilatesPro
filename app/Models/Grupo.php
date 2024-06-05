<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'profesor_id',
    ];

    public function clase() {
        return $this->hasMany(Clase::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

}
