<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'level', 'user_id', 'gender', 'phone', 'address',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}