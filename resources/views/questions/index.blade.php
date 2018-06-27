@extends('layouts.master')

@section('title', 'Questions Bank')

@section('css')
    <link href="{{ asset('css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-sm-4">
                <h2>Questions Bank</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="active">
                        <strong>Questions Bank</strong>
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
                            <h5>All Questions</h5>
                            <div class="ibox-tools">
                                <a href="{{ route('questions.create') }}">
                                    <div class="btn btn-success">Add New Question</div>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div class="project-list">
                                <table class="table table-hover">
                                    <tbody>
                                    @foreach($questions as $question)
                                        <tr>
                                            <td class="project-status">
                                                <span class="label label-primary">{{ $question->id }}</span>
                                            </td>
                                            <td class="project-title">
                                                <a href="{{ URL::to('professor/questions/' . $question->id) }}">{{ $question->question}}</a>
                                                <br/>
                                                <small>
                                                    Created {{ date('F d', strtotime($question->created_at)) }}
                                                </small>
                                            </td>
                                            <td class="project-status">
                                                <span class="label label-primary">{{ $question->user->name }}</span>
                                            </td>
                                            <td class="project-status">
                                                <span class="label label-primary">{{ $question->user_update->name }}</span>
                                            </td>
                                            <td class="project-status">
                                                <span class="label label-primary">{{ $question->course->name }}</span>
                                            </td>
                                            <td class="project-actions">
                                                <a href="{{ URL::to('professor/questions/' . $question->id) }}"
                                                   class="btn btn-success btn-sm">
                                                    <i class="fa fa-file-text"></i> View </a>

                                                <a href="{{ URL::to('professor/questions/' . $question->id . '/edit') }}"
                                                   class="btn btn-warning btn-sm">
                                                    <i class="fa fa-edit"></i> Edit </a>

                                                <form action="{{ url('professor/questions/'.$question->id) }}"
                                                      method="POST"
                                                      style="display: inline-block">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" id="delete-task-{{ $question->id }}"
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

