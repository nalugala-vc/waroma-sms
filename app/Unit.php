<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $guarded=[];
    public function course(){
        return $this->belongsTo(Course::class,'course_id','id');
    }

    public function student(){
        return $this->hasMany(Student::class,'student_units','unit_id','student_id');
    }
}
