<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model 
{

    protected $table = 'cities';
    public $timestamps = true;
    protected $fillable = array('name','government_id');

    public function client()
    {
        return $this->hasMany('App\Client');
    }

    public function Government()
    {
        return $this->belongsTo('App\Government');
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }

}