<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeccionContenido extends Model
{
    use HasFactory;

    protected $fillable = [
        'idSeccion',
        'titulo',
        'parrafo',
        'orden',
        'idImagenUno',
        'idImagenDos',
        'idPagina',
    ];
    public function seccion()
    {
        return $this->belongsTo(Seccion::class, 'idSeccion');
    }

    public function imagenUno()
    {
        return $this->belongsTo(ImagenesSeccion::class, 'idImagenUno', 'id');
    }

    public function imagenDos()
    {
        return $this->belongsTo(ImagenesSeccion::class, 'idImagenDos', 'id');
    }

    public function pagina() 
    {
        return $this->belongsTo(Pagina::class, 'idPagina');
    }
    public function resolveRouteBinding($value, $field = null)
    {
        // Asegúrate de que esta función está devolviendo una instancia del modelo correctamente.
        return $this->where($field ?? 'id', $value)->first();
    }
}
