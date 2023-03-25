<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courseadmin extends Model
{
    public function lecturers(){
        return $this->belongsTo(Lecturer::class,'lecturer_id','id');
    }

    public function courses(){
        return $this->hasOne(Course::class,'course_id');
    }
}
