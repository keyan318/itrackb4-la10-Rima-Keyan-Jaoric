<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
   protected $fillable=['title', 'genre', 
   'year', 'director', 'rating', 'duration', 'is_featured'];

   protected function casts():array{
    return[
        'is_featured'=>'boolean',
        'year'=>'integer',
        'rating'=>'float'
    ];
   }
}
