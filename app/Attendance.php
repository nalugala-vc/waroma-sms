<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{

    protected $guarded=[];
    public function unit(){
        return $this->belongsTo(Unit::class,'unit_id','id');
    }
}
