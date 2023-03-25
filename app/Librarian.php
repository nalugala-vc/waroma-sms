<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Librarian extends Authenticatable
{
    use Notifiable;
    protected $table='librarians';

    protected $fillable=[
        'username','password','profile_pic'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
