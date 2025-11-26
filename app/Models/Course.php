<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'description', 'instructor'];

    public function reviews() {
        return $this->hasMany(Review::class);
    }

    public function getRouteKeyName() {
        return 'slug';
    }
}
