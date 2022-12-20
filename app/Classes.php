<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $guarded=[];

    public function lecturer(){
        return $this->belongsTo(Lecturer::class);
    }

    public function students(){
        return $this->belongsToMany(Student::class,'student_classes','classes_id','students_id');
    }

    public function assignments(){
        return $this->hasMany(Assignments::class,'class_id','id');
    }
}
