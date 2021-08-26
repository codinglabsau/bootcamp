<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations;

class Genre extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function movie() : Relations\BelongsToMany
    {
        //calls relation of movie to genre through gerne_movie
        return $this->belongsToMany(Movie::class);
    }
}
