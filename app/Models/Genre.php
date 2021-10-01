<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Genre extends Model
{
    use HasFactory, SoftDeletes;

    public function movies() : Relations\BelongsToMany
    {
        return $this->belongsToMany(Movie::class, 'genre_movies');
    }
}
