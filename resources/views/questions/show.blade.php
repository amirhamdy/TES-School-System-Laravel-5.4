@extends('layouts.master')

@section('title', 'View Question')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-sm-4">
                <h2>Question details</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="active">
                        <strong>Question details</strong>
                    </li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Question</label>
                            {{ $question->question }}
                        </div>
                        <div class="form-group">
                            <label for="level" class="col-md-4 control-label">Option 1</label>
                            {{ $question->option1 }}
                        </div>
                        <div class="form-group">
                            <label for="level" class="col-md-4 control-label">Option 2</label>
                            {{ $question->option2 }}
                        </div>
                        <div class="form-group">
                            <label for="level" class="col-md-4 control-label">Option 3</label>
                            {{ $question->option3 }}
                        </div>
                        <div class="form-group">
                            <label for="level" class="col-md-4 control-label">Option 4</label>
                            {{ $question->option4 }}
                        </div>
                        <div class="form-group">
                            <label for="professor" class="col-md-4 control-label">Answer</label>
                            {{ 'Option '.$question->answer }}
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Course Name</label>
                            {{ $question->course->name }}
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Created By</label>
                            {{ $question->user->name }}
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Created At</label>
                            {{ date('F d, Y', strtotime($question->created_at)) }}
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Updated By</label>
                            {{ $question->user_update->name }}
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Updated At</label>
                            {{ date('F d, Y', strtotime($question->updated_at)) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
