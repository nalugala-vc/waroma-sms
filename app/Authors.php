<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Authors extends Model
{
    protected $guarded=[];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
