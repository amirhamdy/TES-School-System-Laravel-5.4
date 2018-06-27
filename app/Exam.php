<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'level', 'course_id', 'added_by', 'updated_by',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'added_by');
    }

    public function user_update()
    {
        return $this->belongsTo('App\User', 'updated_by');
    }

    public function course()
    {
        return $this->belongsTo('App\Course', 'course_id');
    }

}
