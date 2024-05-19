<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;
    public function detalles()
    {
        return $this->hasMany(FacturaDetalles::class);
    }
    public function alumno()
    {
        return $this->belongsTo(User::class);
    }
}
