<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseFiles extends Model
{
    protected $fillable = [
        'filename', 'added_by', 'updated_by', 'professor', 'course'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'professor');
    }

    public function course()
    {
        return $this->belongsTo('App\Course', 'course');
    }

}
