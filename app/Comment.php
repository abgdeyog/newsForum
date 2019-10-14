<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id', 'post_id', 'text'
    ];

    public function post()
    {
        return $this->belongsTo('App\Post', 'post_id');
    }

    public function author()
    {
        return$this->belongsTo('App\User', 'user_id');
    }
}
