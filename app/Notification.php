<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model 
{

    protected $table = 'notifications';
    public $timestamps = true;
    protected $fillable = array('body', 'title', 'description');

    public function clients()
    {
        return $this->belongsToMany('App\Client');
    }

    public function orders()
    {
        return $this->belongsTo('App\Order');
    }

}