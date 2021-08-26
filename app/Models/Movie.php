<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Relation;

class Movie extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $casts = [
        'release_date' => 'date'
    ];

    public function genres() : Relations\BelongsToMany
    {
        /*** calls relation of movie to genre through gerne_movie
        */
        return $this->belongsToMany(Genre::class);
    }


}
