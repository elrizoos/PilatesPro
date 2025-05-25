<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MensajesVisto extends Model
{
    use HasFactory;

    protected $fillable = ['usuario_id','mensaje_id','mensajeVisto'];

    public function mensaje(){
        return $this->hasOne(Mensaje::class);
    }
}
