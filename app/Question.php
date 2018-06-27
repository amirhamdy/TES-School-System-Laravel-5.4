<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'question', 'option1', 'option2', 'option3', 'option4', 'answer', 'added_by', 'updated_by', 'course_id'
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
