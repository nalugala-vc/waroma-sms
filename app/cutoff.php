<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cutoff extends Model
{
    protected $guarded=[];
    public function course(){
        return $this->belongsTo(Course::class);
    }
}
