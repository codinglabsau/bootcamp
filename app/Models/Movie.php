<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
    use SoftDeletes, HasFactory;

    protected $casts = [
        'release_date' => 'date',
    ];

    protected $guarded = [];

    public function genres(): Relations\BelongsToMany
    {
        /*** calls relation of movie to genre through gerne_movie
         */
        return $this->belongsToMany(Genre::class);
    }

    public function celebrities(): Relations\BelongsToMany
    {
        return $this->belongsToMany(Celebrity::class);
    }
}
