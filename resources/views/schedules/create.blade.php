@extends('layouts.master')

@section('title', 'Create Schedule')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create New Schedule</div>
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
                              action="{{ url('schedules/schedules') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
                                <label for="level" class="col-md-4 control-label">Level</label>
                                <div class="col-md-6">
                                    <select class="form-control m-b" name="level">
                                        <option value="1" selected>Level 1</option>
                                        <option value="2">Level 2</option>
                                        <option value="3">Level 3</option>
                                        <option value="4">Level 4</option>
                                    </select>
                                    @if ($errors->has('level'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('level') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('start') ? ' has-error' : '' }}">
                                <label for="start" class="col-md-4 control-label">Start Date/Time</label>
                                <div class="col-md-6">
                                    <input id="start" type="datetime-local" class="form-control" name="start"
                                           value="{{ old('start') }}" required autofocus>
                                    @if ($errors->has('start'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('start') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('end') ? ' has-error' : '' }}">
                                <label for="end" class="col-md-4 control-label">End Date/Time</label>
                                <div class="col-md-6">
                                    <input id="end" type="datetime-local" class="form-control" name="end"
                                           value="{{ old('end') }}" required>
                                    @if ($errors->has('end'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('end') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('exam_id') ? ' has-error' : '' }}">
                                <label for="exam_id" class="col-md-4 control-label">Exam</label>
                                <div class="col-md-6">
                                    <select class="form-control m-b" name="exam_id">
                                        @foreach ($exams as $key => $exam)
                                            <option value="{{$key}}">{{$exam}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('exam_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('exam_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary"> Save</button>
                                    <a class="btn btn-link" href="{{ url('schedules/schedules') }}"> Cancel</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection