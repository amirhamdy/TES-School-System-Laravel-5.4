<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'body', 'added_by', 'updated_by'];

    public function user()
    {
        return $this->belongsTo('App\User', 'added_by');
    }

    public function user_update()
    {
        return $this->belongsTo('App\User', 'updated_by');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

}
