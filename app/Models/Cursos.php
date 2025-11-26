<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    //Opcional pero recomendado
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
