<?php

use Collective\Html\FormFacade;

?>
@extends('layouts.master')

@section('title', 'Create Question')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create New Question</div>
                    <div class="panel-body">
                        <!-- Display Validation Errors -->
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="form-horizontal" role="form" method="POST"
                              action="{{ url('professor/questions') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('question') ? ' has-error' : '' }}">
                                <label for="question" class="col-md-4 control-label">Question</label>
                                <div class="col-md-6">
                                    <input id="question" type="text" class="form-control" name="question"
                                           value="{{ old('question') }}" required autofocus>
                                    @if ($errors->has('question'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('question') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('option1') ? ' has-error' : '' }}">
                                <label for="option1" class="col-md-4 control-label">Option 1</label>
                                <div class="col-md-6">
                                    <input id="option1" type="text" class="form-control" name="option1"
                                           value="{{ old('option1') }}" required>
                                    @if ($errors->has('option1'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('option1') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('option2') ? ' has-error' : '' }}">
                                <label for="option2" class="col-md-4 control-label">Option 2</label>
                                <div class="col-md-6">
                                    <input id="option2" type="text" class="form-control" name="option2"
                                           value="{{ old('option2') }}" required>
                                    @if ($errors->has('option2'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('option2') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('option3') ? ' has-error' : '' }}">
                                <label for="option3" class="col-md-4 control-label">Option 3</label>
                                <div class="col-md-6">
                                    <input id="option3" type="text" class="form-control" name="option3"
                                           value="{{ old('option3') }}" required>
                                    @if ($errors->has('option3'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('option3') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('option4') ? ' has-error' : '' }}">
                                <label for="option4" class="col-md-4 control-label">Option 4</label>
                                <div class="col-md-6">
                                    <input id="option4" type="text" class="form-control" name="option4"
                                           value="{{ old('option4') }}" required>
                                    @if ($errors->has('option4'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('option4') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('answer') ? ' has-error' : '' }}">
                                <label for="answer" class="col-md-4 control-label">Answer</label>
                                <div class="col-md-6">
                                    <select class="form-control m-b" name="answer">
                                        <option value="1" selected>Option 1</option>
                                        <option value="2">Option 2</option>
                                        <option value="3">Option 3</option>
                                        <option value="4">Option 4</option>
                                    </select>
                                    @if ($errors->has('answer'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('answer') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('course_id') ? ' has-error' : '' }}">
                                <label for="course_id" class="col-md-4 control-label">Course</label>
                                <div class="col-md-6">
                                    <select class="form-control m-b" name="course_id">
                                        @foreach ($courses as $key => $course)
                                            <option value="{{$key}}">{{$course}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('course_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('course_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary"> Save</button>
                                    <a class="btn btn-link" href="{{ url('professor/questions') }}"> Cancel</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection