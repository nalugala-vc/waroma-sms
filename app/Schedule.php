<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $guarded=[];
    public function course(){
        return $this->belongsTo(Course::class,'courses_id','id');
    }

    public function unit(){
        return $this->belongsTo(Unit::class,'units_id','id');
    }

    public function lecturer(){
        return $this->belongsTo(Lecturer::class,'lecturers_id','id');
    }
}
