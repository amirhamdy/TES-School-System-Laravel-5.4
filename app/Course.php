<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Course extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'added_by', 'updated_by', 'professor', 'level', 'status'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'added_by');
    }

    public function user_update()
    {
        return $this->belongsTo('App\User', 'updated_by');
    }

    public function user_professor()
    {
        return $this->belongsTo('App\User', 'professor');
    }

    public function questions($id)
    {
        $questions = DB::table('questions')->select(DB::raw('*'))
            ->where('course_id', '=', $id)->get();
        return $questions;
        //return $this->hasMany('App\Question', 'course_id');
    }

}
