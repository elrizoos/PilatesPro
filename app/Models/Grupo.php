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

    public function clases()
    {
        return $this->hasMany(Clase::class, 'grupo_id');
    }

    public function usuarios()
    {
        return $this->hasMany(User::class, 'grupo_id');
    }

    public function profesor()
    {
        return $this->belongsTo(User::class, 'profesor_id');
    }
}
