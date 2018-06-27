@extends('layouts.master')

@section('title', 'View Exam')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Exam Info</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Name</label>
                            {{ $exam->name }}
                        </div>
                        <div class="form-group">
                            <label for="level" class="col-md-4 control-label">Level</label>
                            {{ 'Level '.$exam->level }}
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Course</label>
                            {{ $exam->course->name }}
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Created By</label>
                            {{ $exam->user->name }}
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Created At</label>
                            {{ date('F d, Y', strtotime($exam->created_at)) }}
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Updated By</label>
                            {{ $exam->user_update->name }}
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Updated At</label>
                            {{ date('F d, Y', strtotime($exam->updated_at)) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
