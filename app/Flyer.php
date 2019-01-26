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

    public static function locatedAt($zip, $street)
    {
        $street = str_replace('-', ' ', $street);

        return static::where(compact('zip', 'street'))->firstOrFail();
    }

    public function getPriceAttribute($price)
    {
        return '&euro; '.number_format($price);
    }

    public function getParcedStreet()
    {
        $street = str_replace(' ', '-', $this->street);
        return $street;
    }
}
