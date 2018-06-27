@extends('layouts.master')

@section('title', 'Feedback')

@section('css')
    <link href="{{ asset('css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    {{--
    <div class="wrapper wrapper-content animated fadeInRight">
       <div class="row">
           <div class="col-md-12">
               @if (Session::has('message'))
                   <div class="col-md-12">
                       <div class="alert alert-info">{{ Session::get('message') }}</div>
                   </div>
               @endif
               <div class="pull-left">
                   <a href="{{ route('posts.create') }}">
                       <div class="btn btn-success">Add New Post</div>
                   </a>
               </div>
               <table class="table">
                   <thead>
                   <tr>
                       <th>ID</th>
                       <th>POST TITLE</th>
                       <th>VIEW FEEDBACK</th>
                       <th>ADD COMMENT</th>
                       <th>EDIT FEEDBACK</th>
                       <th>DELETE FEEDBACK</th>
                   </tr>
                   </thead>
                   <tbody>
                   @foreach($posts as $post)
                       <tr>
                           <td>{{ $post->id }}</td>
                           <td>{{ $post->title }}</td>
                           <td><a class="btn btn-default" href="{{ URL::to('student/posts/' . $post->id) }}">View this
                                   Post! </a></td>
                           <td><a class="btn btn-default" href="{{ URL::to('student/posts/' . $post->id) }}">Add Comment</a></td>
                           <td><a class="btn btn-primary" href="{{ URL::to('student/posts/' . $post->id . '/edit') }}">Edit
                                   Post</a></td>
                           <td>
                               <form action="{{ url('student/posts/'.$post->id) }}" method="POST"
                                     style="display: inline-block">
                                   {{ csrf_field() }}
                                   {{ method_field('DELETE') }}
                                   <button type="submit" id="delete-task-{{ $post->id }}"
                                           class="btn btn-danger">
                                       <i class="fa fa-trash"></i> Delete Post
                                   </button>
                               </form>

                           </td>
                       </tr>
                   @endforeach()
                   </tbody>
               </table>
           </div>
       </div>
   </div>
   {{--

   --}}
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-sm-4">
                <h2>Feedback list</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="active">
                        <strong>Feedback list</strong>
                    </li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
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
                        <div class="ibox-title">
                            <h5>All Feedbacks</h5>
                            <div class="ibox-tools">
                                <a href="{{ route('posts.create') }}">
                                    <div class="btn btn-success">Add New Feedback</div>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="project-list">
                                <table class="table table-hover">
                                    <tbody>
                                    @foreach($posts as $post)
                                        <tr>
                                            <td class="project-status">
                                                <span class="label label-primary">{{ $post->id }}</span>
                                            </td>
                                            <td class="project-title">
                                                <a href="{{ URL::to('student/posts/' . $post->id) }}">{{ $post->title }}</a>
                                                <br/>
                                                <small>
                                                    Created {{ date('F d', strtotime($post->created_at)) }}
                                                </small>
                                            </td>
                                            <td class="project-status">
                                                <span class="label label-primary">{{ $post->user->name }}</span>
                                            </td>
                                            <td class="project-status">
                                                <span class="label label-primary">{{ $post->user_update->name }}</span>
                                            </td>
                                            <td>
                                                <p class="small">
                                                    {{ str_limit($post->body, $limit = 40, $end = '...')}}
                                                </p>
                                            </td>
                                            <td class="project-actions">
                                                <a href="{{ URL::to('student/posts/' . $post->id) }}"
                                                   class="btn btn-success btn-sm">
                                                    <i class="fa fa-file-text"></i> View </a>

                                                <a href="{{ URL::to('student/comments/create?id='.$post->id) }}"
                                                   class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil"></i> Add Comment </a>

                                                <a href="{{ URL::to('student/posts/' . $post->id . '/edit') }}"
                                                   class="btn btn-warning btn-sm">
                                                    <i class="fa fa-edit"></i> Edit </a>

                                                <form action="{{ url('student/posts/'.$post->id) }}" method="POST"
                                                      style="display: inline-block">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" id="delete-task-{{ $post->id }}"
                                                            class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach()
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

