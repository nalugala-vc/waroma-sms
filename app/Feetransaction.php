<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feetransaction extends Model
{
    public function student(){

        
        return $this->belongsTo(Student::class);
    }
}
