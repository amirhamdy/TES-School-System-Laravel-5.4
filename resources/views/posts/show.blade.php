@extends('layouts.master')

@section('title', 'View Post')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-sm-4">
                <h2>Feedback details</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="active">
                        <strong>Feedback details</strong>
                    </li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-9 col-lg-offset-1">
                <div class="wrapper wrapper-content animated fadeInUp">
                    <div class="ibox">
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
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="m-b-md">
                                        <a href="{{ URL::to('student/posts/' . $post->id . '/edit') }}"
                                           class="btn btn-success btn-sm pull-right">Edit Feedback</a>
                                        <h2>{{ $post->title }}</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5">
                                    <dl class="dl-horizontal">
                                        <dt>Created:</dt>
                                        <dd> {{ date('F d, Y', strtotime($post->created_at)) }}</dd>
                                        <dt>Created by:</dt>
                                        <dd>{{ $post->user->name }}</dd>
                                    </dl>
                                </div>
                                <div class="col-lg-7" id="cluster_info">
                                    <dl class="dl-horizontal">
                                        <dt>Last Updated:</dt>
                                        <dd> {{ date('F d, Y', strtotime($post->updated_at)) }}</dd>
                                        <dt>Updated by:</dt>
                                        <dd> {{ $post->user_update->name }}</dd>
                                        <dt>Comments:</dt>
                                        <dd> {{ $post->comments->count() }}</dd>
                                    </dl>
                                </div>
                                <div class="col-lg-10">
                                    <dl class="dl-horizontal">
                                        <dt>Body:</dt>
                                        <dd> {{ $post->body }}</dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="row m-t-sm">
                                <div class="col-lg-12">
                                    <div class="panel blank-panel">
                                        <div class="panel-heading">
                                            <div class="panel-options">
                                                <ul class="nav nav-tabs">
                                                    <li class="active">
                                                        <a href="#tab-1" data-toggle="tab">Users comments</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab-1">
                                                    <div class="feed-activity-list">
                                                        @foreach($post->comments as $comment)
                                                            <div class="feed-element">
                                                                <div class="media-body ">
                                                                    <small class="pull-right">{{ $comment->created_at->diffForHumans() }} </small>
                                                                    <strong>{{ $comment->user->name }}</strong>
                                                                    commented on
                                                                    <strong>{{ $post->user->name }}</strong> post. <br>
                                                                    <small class="text-muted">{{ $comment->created_at }}</small>
                                                                    <div class="well">{{ $comment->comment }}</div>
                                                                    <a href="{{ URL::to('student/comments/' . $comment->id . '/edit') }}"
                                                                       class="btn btn-warning btn-xs">
                                                                        <i class="fa fa-edit"></i> Edit </a>

                                                                    <form action="{{ url('student/comments/'.$comment->id) }}"
                                                                          method="POST"
                                                                          style="display: inline-block">
                                                                        {{ csrf_field() }}
                                                                        {{ method_field('DELETE') }}
                                                                        <button type="submit"
                                                                                id="delete-task-{{ $comment->id }}"
                                                                                class="btn btn-danger btn-xs">
                                                                            <i class="fa fa-trash"></i> Delete
                                                                        </button>
                                                                    </form>

                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <!-- Display Validation Errors -->
                                    @if (count($errors) > 0)
                                        <div class="alert alert-danger">
                                            <strong>Whoops!</strong> There were some problems with your
                                            input.<br><br>
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form class="form-horizontal" role="form" method="POST"
                                          action="{{ url('student/comments') }}">
                                        {{ csrf_field() }}
                                        <input id="post_id" type="hidden" class="form-control"
                                               name="post_id" value="{{ $post->id }}" required/>
                                        <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                                            <label for="comment" class="col-md-3 control-label">Your Reply</label>
                                            <div class="col-md-8">
                                    <textarea id="comment" rows="1" class="form-control" name="comment"
                                              value="{{ old('comment') }}" required></textarea>
                                                @if ($errors->has('comment'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('comment') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-8 col-md-offset-3">
                                                <button type="submit" class="btn btn-primary"> Add</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
