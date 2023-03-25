<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
   protected $guarded=[];
   public function unit(){
    return $this->hasMany(Unit::class);
   }

   public function feestructure(){
    return $this->hasMany(Feestructure::class);
   }

   public function faculty(){
      return $this->belongsTo(Faculty::class);
   }

   public function admins(){
      return $this->hasOne(Courseadmin::class,'course_id','id');
   }

   public function cuttOff(){
      return $this->hasOne(cutoff::class);
   }
}
