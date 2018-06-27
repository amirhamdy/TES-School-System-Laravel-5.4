<?php

use App\Post;
use Illuminate\Support\Facades\Input;

$post = Post::find(Input::get('id'));
?>
@extends('layouts.master')

@section('title', 'Create Comment')

@section('content')

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create New Comment</div>
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
                        @if (Session::has('message'))
                            <div class="col-md-12">
                                <div class="alert alert-info">{{ Session::get('message') }}</div>
                            </div>
                        @endif
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('student/comments') }}">
                            {{ csrf_field() }}
                            <input id="post_id" type="hidden" class="form-control" name="post_id" value="{{ $post->id }}" required />
                            <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                                <label for="comment" class="col-md-4 control-label">Your Comment</label>
                                <div class="col-md-6">
                                    <textarea id="comment" rows="7" class="form-control" name="comment"
                                              value="{{ old('comment') }}" required autofocus></textarea>
                                    @if ($errors->has('comment'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('comment') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary"> Save</button>
                                    <a class="btn btn-link" href="{{ url('student/posts') }}"> Cancel</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection