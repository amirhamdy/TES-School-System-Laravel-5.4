<?php ?>
@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Course Management</div>
                    <div class="panel-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <table class="table table-striped table-bordered table-condensed">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Created By</th>
                                <th>Created At</th>
                                <th>Updated By</th>
                                <th>Updated At</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($courses as $key => $course)
                                <tr class="list-classes">
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $course->name }}</td>
                                    <td>{{ $course->added_by }}</td>
                                    <td>{{ date('M d, Y', strtotime($course->created_at)) }}</td>
                                    <td>{{ $course->updated_by }}</td>
                                    <td>{{ date('M d, Y', strtotime($course->updated_at)) }}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('courses.show',$course->id) }}">Show</a>
                                        <a class="btn btn-primary"
                                           href="{{ route('courses.edit',$course->id) }}">Edit</a>

                                        <form action="{{ url('professor/courses/'.$course->id) }}" method="POST"
                                              style="display: inline-block">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" id="delete-task-{{ $course->id }}"
                                                    class="btn btn-danger">
                                                <i class="fa fa-btn fa-trash"></i>Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('courses.create') }}" class="btn btn-success">New Course</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
