<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model 
{

    protected $table = 'orders';
    public $timestamps = true;
    protected $fillable = array('name', 'age', 'latitude','client_id', 'longitude', 'blood_type','client_id' ,'city_id',   'many_bages', 'hospital_name', 'hospital_addres', 'phone', 'notes');

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function notifications()
    {
        return $this->hasOne('App\Notification');
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }

}