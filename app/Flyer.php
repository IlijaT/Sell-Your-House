<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flyer extends Model
{
    protected $guarded = ['id'];
    
    public function photos()
    {
        return $this->hasMany('App\Photo');
    }
}
