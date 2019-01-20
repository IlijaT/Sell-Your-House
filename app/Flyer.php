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

    public function scopeLocatedAt($query, $zip, $street) 
    
    {
        $street = str_replace('-', ' ', $street);

        return $query->where(compact('zip', 'street'));
    
    }

    public function getPriceAttribute($price) 
    
    {
        
        return '&euro; '.number_format($price);
    }
}
