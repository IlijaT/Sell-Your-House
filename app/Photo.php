<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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

    public function delete()
    {
        Storage::delete('public/'.$this->path);

        parent::delete();
    }
}
