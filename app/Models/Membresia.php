<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membresia extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'price_id'
    ];

    // Relación muchos a muchos con el modelo User
    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withPivot('subscription_id', 'status')
            ->withTimestamps();
    }
}
