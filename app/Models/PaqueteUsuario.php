<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaqueteUsuario extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'producto_id',
        'fecha_compra',
        'payment_method_id',
    ];

    /**
     * Get the producto associated with the PaqueteUsuario
     *
     *@return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function producto()
{
    return $this->belongsTo(Producto::class, 'producto_id');
}
}
