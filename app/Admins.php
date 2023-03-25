<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Admins extends Authenticatable
{
    use Notifiable;
    protected $table='admins';

    protected $fillable=[
        'name','email','password','phone_number','profile_pic'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
