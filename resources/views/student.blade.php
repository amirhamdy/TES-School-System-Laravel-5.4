<?php

use Illuminate\Support\Facades\DB;

$user = Auth::user();
$student = $user->my_student();
$student2 = (array)$user->my_student();
$user2 = array_first(DB::table('users')->select('*')->where('id', '=', $student2['user_id'])->get());

/*print_r($user);
print_r($student);
print_r($user2);*/

?>

@extends('layouts.master')

@section('title', 'My Student')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Student Info</div>
                    <div class="panel-body">
                        @role('parent')
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Name</label>
                            {{ $user2->name }}
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">E-mail</label>
                            {{ $user2->email }}
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Level</label>
                            {{ 'Level '.$student->level }}
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Phone</label>
                            {{ $student->phone}}
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Address</label>
                            {{ $student->address }}
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Gender</label>
                            {{ $student->gender }}
                        </div>
                        @endrole
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
