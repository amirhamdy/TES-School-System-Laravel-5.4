@extends('layouts.master')

@section('title', 'View Course')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Course Info</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Name</label>
                            {{ $course->name }}
                        </div>
                        <div class="form-group">
                            <label for="level" class="col-md-4 control-label">Level</label>
                            {{ 'Level '.$course->level }}
                        </div>
                        <div class="form-group">
                            <label for="status" class="col-md-4 control-label">Status</label>
                            {{ $course->status?'Opened':'Closed' }}
                        </div>
                        <div class="form-group">
                            <label for="professor" class="col-md-4 control-label">Professor</label>
                            {{ $course->user_professor->name }}
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Created By</label>
                            {{ $course->user->name }}
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Created At</label>
                            {{ date('F d, Y', strtotime($course->created_at)) }}
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Updated By</label>
                            {{ $course->user_update->name }}
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Updated At</label>
                            {{ date('F d, Y', strtotime($course->updated_at)) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
