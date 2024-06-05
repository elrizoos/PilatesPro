<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroTiempo extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'clases_totales',
        'clases_45',
        'clases_60',
        'clases_120',
        'minutos_totales',
        'clases_disfrutadas',
        'tiempo_disfrutado'
    ];
    /**
     * Get the user that owns the RegistroTiempo
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
