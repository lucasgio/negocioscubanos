<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Negocios extends Model
{
    protected $fillable = [

        'nombre_negocio',
        'categoria_id',
        'imagen_principal',
        'calle',
        'provincia',
        'municipio',
        'lat',
        'lng',
        'telefono',
        'descripcion',
        'apertura',
        'cierre',
        'uuid',
        'user_id'

    ];


    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
