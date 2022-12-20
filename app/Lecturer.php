<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Lecturer extends Authenticatable
{
   
    use Notifiable;

    protected $guard='lecturer';

    protected $table = 'lecturers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','profile_pic',
        'phone_number','gender'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];  //

    public function classes(){
        return $this->hasMany(Classes::class);
    }

    public function units(){
        return $this->belongsToMany(Unit::class,'lecturer_units','lecturer_id','units_id');
    }

    public function students()
    {
        # code...
        return $this->hasManyThrough(Student::class,Classes::class);
    }

    public function schedule(){
        return $this->hasMany(Schedule::class,'lecturers_id','id');
    }
}
