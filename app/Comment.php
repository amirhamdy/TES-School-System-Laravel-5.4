<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['comment', 'post_id', 'added_by', 'updated_by'];

    public function user()
    {
        return $this->belongsTo('App\User', 'added_by');
    }

    public function user_update()
    {
        return $this->belongsTo('App\User', 'updated_by');
    }

    public function post()
    {
        return $this->belongsTo('App\Post', 'post_id');
    }

}
