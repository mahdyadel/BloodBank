<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model 
{

    protected $table = 'settings';
    public $timestamps = true;
    protected $fillable = array('name', 'email', 'about', 'phone', 'email', 'facebook', 'twiter', 'instgram');

}