<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = [
        'stripe_id',
        'name',
        'description',
        'type',
        'precio',
        'quantity',
        'precio_stripe_id',
    ];
    public function subscription()
    {
        return $this->hasMany(Subscription::class);
    }
}
