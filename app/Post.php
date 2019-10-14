<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id', 'header', 'description'
    ];

    public function comments()
    {
        return $this->hasMany('App\Comment', 'post_id');
    }

    public function author()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
