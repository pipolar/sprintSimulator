<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cursos extends Model
{

    use HasFactory;

    protected $fillable = [
        'titulo',
        'slug',
        'descripcion',
        'instructor',
    ];

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
