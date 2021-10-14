<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Celebrity extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'name', 
        'dob',
        'nationality',
        'bio',
    ];

    public function movies(): Relations\BelongsToMany
    {
        return $this->belongsToMany(Movie::class, 'celebrity_movies');
    }
}
