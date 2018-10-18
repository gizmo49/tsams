<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
   
    protected $table = "users";
    protected $fillable = [
        'username', 'password',
    ];

   
    protected $hidden = [
        'password', 'remember_token',
    ];
}
