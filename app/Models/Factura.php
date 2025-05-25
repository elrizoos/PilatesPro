<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha_emision',
        'monto_total',
        'alumno_id',
        'pdf',
        'stripe_id',
    ];
    public function detalles()
    {
        return $this->hasMany(FacturaDetalle::class);
    }
    public function alumno()
    {
        return $this->belongsTo(User::class);
    }
}
