<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Celebrity extends Model
{
    use HasFactory, Notifiable,SoftDeletes;


    protected $fillable = [
        'name', 
        'dob',
        'nationality',
        'bio',
    ];
}
