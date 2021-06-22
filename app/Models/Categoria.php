<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    
    public function getRouteKeyName()
    {
        return 'slug';
    }


    // Relacion 1:n categoria - negocios
    public function negocios()
    {
        return $this->hasMany(Negocios::class);
    }

}
