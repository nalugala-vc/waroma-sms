<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
   
    use Notifiable;

    protected $table = 'students';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','picture',
        'course_id','year','phone_number','gender','parent_name',
        'parent_email','parent_number','home_location','semester',
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
    ];

    
   public function classes(){
    return $this->belongsToMany(Classes::class,'student_classes','students_id','classes_id');
}
    public function course(){
        return $this->belongsTo(Course::class);
    }

    public function schedule(){
        return $this->belongsToMany(Schedule::class,'student_schedules','students_id','schedule_id');
    }

    public function attendance(){
        return $this->hasMany(Attendance::class,'student_id','id');
    }
   
    public function units(){
        return $this->belongsToMany(Unit::class,'student_units','student_id','unit_id');
    }

    public function feetransaction(){
        return $this->hasMany(Feetransaction::class,'student_id','id');
    }

    // public function feestructure(){
    //     return $
    // }
}
