<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model 
{

    protected $table = 'posts';
    public $timestamps = true;
    protected $fillable = array('title', 'image', 'content', 'description');

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function favourites()
    {
        return $this->belongsToMany('App\Client');
    }

}