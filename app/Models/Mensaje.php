<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    use HasFactory;
    protected $fillable = ['conversation_id', 'user_id', 'body'];

    public function conversation()
    {
        return $this->belongsTo(Conversacione::class, 'conversation_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mensajesVistos() {
        return $this->hasOne(MensajesVisto::class,'mensaje_id');
    }
}
