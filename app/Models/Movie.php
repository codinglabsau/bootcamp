<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $casts = [
        'release_date' => 'date'
    ];

    public function genres()
    {
        /*** function calls relation of Movie to Genre through genre_movies,
         * with a foreign key of the model the relationship is definied in
         * and a foreign key of the model the relationship is with
         * */
        return $this->belongsToMany(Genre::class); //(Many to relation, relation table medium, foreign key 1, foreign key 2)
    }


}
