<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function courses()
    {
        return $this->hasMany('App\Course', 'added_by');
    }

    public function student()
    {
        return array_first(DB::table('students')->select('*')->where('user_id', '=', Auth::id())->get());
    }

    public function parent()
    {
        return array_first(DB::table('parents')->select('*')->where('user_id', '=', Auth::id())->get());
    }

    public function my_student()
    {
        $r = (array)array_first(DB::table('parents')->select('*')->where('user_id', '=', Auth::id())->get());
        /*        //print_r($r);
                $result = (array) $r;
                print_r($result);
                echo $result['student_id'];
                die();*/
        return array_first(DB::table('students')->select('*')->where('id', '=', $r['student_id'])->get());
    }

}
