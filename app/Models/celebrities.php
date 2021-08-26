<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class celebrities extends Authenticatable
{
    use HasFactory, Notifiable,SoftDeletes;


    protected $fillable = [
        'name', 
        'DOB',
        'Nationality',
        'Bio',
    ];
}
