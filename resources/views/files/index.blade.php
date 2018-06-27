@php
    use Illuminate\Support\Facades\Input;
@endphp
@extends('layouts.master')

@section('title', 'Course Files')

@section('css')
@endsection

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>All Materials</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('/')}}">Home</a>
                </li>
                <li class="active">
                    <strong>All Materials</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <div class="file-manager">
                            <h5>Show:</h5>
                            <a href="#" class="file-control active">All</a>
                            <a href="#" class="file-control">Documents</a>
                            <a href="#" class="file-control">Audio</a>
                            <div class="hr-line-dashed"></div>
                            <a href="{{ route('files.create','c_id='.Input::get('c_id') ) }}"
                               class="btn btn-primary btn-block">Upload Files</a>
                            <div class="hr-line-dashed"></div>
                            <h5>Folders</h5>
                            <ul class="folder-list" style="padding: 0">
                                <li><a href=""><i class="fa fa-folder"></i> Files</a></li>
                                <li><a href=""><i class="fa fa-folder"></i> Books</a></li>
                            </ul>
                            <h5 class="tag-title">Tags</h5>
                            <ul class="tag-list" style="padding: 0">
                                <li><a href="">Work</a></li>
                                <li><a href="">Level 1</a></li>
                                <li><a href="">Courses</a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        @foreach ($files as $key => $file)
                            <div class="file-box">
                                <div class="file">
                                    <a href="{{ url('/course_material/'.$file->filename) }}">
                                        <span class="corner"></span>
                                        <div class="icon">
                                            <i class="fa fa-file"></i>
                                        </div>
                                        <div class="file-name">
                                            {{$file->filename}}
                                            <br/>
                                            <small>Added By: {{ $file->user->name }}</small>
                                            <br/>
                                            <small>Added At: {{ date('M d, Y', strtotime($file->created_at)) }}</small>
                                            <hr/>
                                            <form action="{{ url('professor/files/'.$file->id) }}"
                                                  method="POST"
                                                  style="display: inline-block">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" id="delete-task-{{ $file->id }}"
                                                        class="btn btn-danger btn-xs">
                                                    <i class="fa fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </a>

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('.file-box').each(function () {
                animationHover(this, 'pulse');
            });
        });
    </script>
@endsection
