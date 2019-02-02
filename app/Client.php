<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model 
{

    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('password', 'phone', 'email','pen_code', 'last_date', 'birthday' ,'name' , 'api_token', 'blood_type_id', 'city_id');

    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    public function notifications()
    {
        return $this->belongsToMany('App\Notification');
    }

    public function blood_types()
    {
        return $this->belongsToMany('App\Blood_type');
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }

    public function contact()
    {
        return $this->hasMany('App\Contact');
    }
    public function favourites()
    {
        return $this->belongsToMany('App\Post');
    }

    public function posts()
    {
        return $this->belongsToMany('App\Post');
    }

    public function blood_type()
    {
        return $this->belongsTo('App\Blood_type');
    }
    protected $hidden = [
        'password', 'api_token',
    ];

}