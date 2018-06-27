<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'level', 'start', 'end', 'exam_id', 'added_by', 'updated_by',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'added_by');
    }

    public function user_update()
    {
        return $this->belongsTo('App\User', 'updated_by');
    }

    public function exam()
    {
        return $this->belongsTo('App\Exam', 'exam_id');
    }

}
