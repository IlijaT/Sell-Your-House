<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $guarded = [];
    
    public function flyer()
    {
        return $this->belongsTo('App\Flyer');
    }

    public function getPathAttribute($path)
    {
        $imagePath = explode("/", $path);
        return $imagePath[1];
    }
}
