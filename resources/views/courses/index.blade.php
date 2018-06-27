<?php

use Illuminate\Support\Facades\Auth;

$user = Auth::user();
?>
@extends('layouts.master')

@section('title', 'Courses')

@section('css')
    <link href="{{ asset('css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="ibox-title">
                        <h5>Courses Table Data</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Professor</th>
                                    <th>Level</th>
                                    <th>Status</th>
                                    <th>Created By</th>
                                    <th>Created At</th>
                                    <th>Updated By</th>
{{--
                                    <th>Updated At</th>
--}}
                                    <th></th>
                                </tr>
                                </thead>
                                @if($user->hasRole(['admin']))
                                    <a href="{{ route('courses.create') }}" class="btn btn-success">New Course</a>
                                @endif
                                <tbody>
                                @foreach ($courses as $key => $course)
                                    <tr class="gradeX">
                                        <td class="center">{{ $course->id }}</td>
                                        <td class="center">{{ $course->name }}</td>
                                        <td class="center">{{ $course->user_professor->name }}</td>
                                        <td class="center">{{ 'Level '.$course->level }}</td>
                                        <td class="center">{{ $course->status == "1"?"Opened":"Closed" }}</td>
                                        <td class="center">{{ $course->user->name }}</td>
                                        <td class="center">{{ date('M d, Y', strtotime($course->created_at)) }}</td>
                                        <td class="center">{{ $course->user_update->name }}</td>
                                        {{--
                                        <td class="center">{{ date('M d, Y', strtotime($course->updated_at)) }}</td>
                                        --}}
                                        @role('admin')
                                        <td class="center">
                                            <a class="btn btn-xs btn-info"
                                               href="{{ route('courses.show',$course->id) }}"><i
                                                        class="fa fa-external-link"></i> Show</a>
                                            <a class="btn btn-xs btn-primary"
                                               href="{{ route('courses.edit',$course->id) }}"><i class="fa fa-edit"></i>
                                                Edit</a>
                                            <form action="{{ url('professor/courses/'.$course->id) }}" method="POST"
                                                  style="display: inline-block">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" id="delete-task-{{ $course->id }}"
                                                        class="btn btn-xs btn-danger">
                                                    <i class="fa fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                        @endrole
                                        @role('professor')
                                        <td class="center">
                                            <a class="btn btn-xs btn-info"
                                               href="{{ route('files.index','c_id='.$course->id) }}"><i
                                                        class="fa fa-external-link"></i> View Material</a>
                                            <a class="btn btn-xs btn-primary"
                                               href="{{ route('files.create','c_id='.$course->id) }}"><i
                                                        class="fa fa-external-link"></i> Upload Material</a>
                                        </td>
                                        @endrole
                                        @role('student')
                                        <td>
                                            <a class="btn btn-xs btn-info"
                                               href="{{ route('files.index','c_id='.$course->id) }}"><i
                                                        class="fa fa-external-link"></i> View Material</a>
                                        </td>
                                        @endrole
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Professor</th>
                                    <th>Level</th>
                                    <th>Status</th>
                                    <th>Created By</th>
                                    <th>Created At</th>
                                    <th>Updated By</th>
                                    <th>Updated At</th>
                                    <th></th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/plugins/dataTables/datatables.min.js')}}"></script>
    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function () {
            $('.dataTables-example').DataTable({
                pageLength: 5,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    {extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {
                        extend: 'print',
                        customize: function (win) {
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        }
                    }
                ]

            });

        });

    </script>
@endsection
