<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $guarded=[];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function author(){
        return $this->belongsTo(Authors::class);
    }
}
