<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
   public function unit(){
    return $this->hasMany(Unit::class);
   }

   public function feestructure(){
    return $this->hasMany(Feestructure::class);
   }
}
