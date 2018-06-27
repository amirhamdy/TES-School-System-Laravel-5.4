@extends('layouts.master')

@section('title', 'Exams')

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
                        <h5>Exams Table Data</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    @role('professor')
                                    <th>Name</th>
                                    @endrole
                                    @role('student')
                                    <th>Start Time</th>
                                    <th>End</th>
                                    @endrole
                                    <th>Course</th>
                                    <th>Level</th>
                                    <th>Created By</th>
                                    @role('professor')
                                    <th>Created At</th>
                                    <th>Updated By</th>
                                    <th>Updated At</th>
                                    @endrole
                                    <th></th>
                                </tr>
                                </thead>
                                @role('professor')
                                <a href="{{ route('exams.create') }}" class="btn btn-success">New Exam</a>
                                @endrole
                                <tbody>
                                @foreach ($exams as $key => $exam)
                                    <tr class="gradeX">
                                        <td class="center">{{ $exam->id }}</td>
                                        @role('professor')
                                        <td class="center">{{ $exam->name }}</td>
                                        <td class="center">{{ $exam->course->name }}</td>
                                        @endrole
                                        @role('student')
                                        <td class="center">{{ date('g:i A \o\n d F', strtotime($exam->start)) }}</td>
                                        <td class="center">{{ date('g:i A', strtotime($exam->end)) }}</td>
                                        <td class="center">{{ $exam->exam->name }}</td>
                                        @endrole
                                        <td class="center">{{ 'Level '.$exam->level }}</td>
                                        <td class="center">{{ $exam->user->name }}</td>
                                        @role('professor')
                                        <td class="center">{{ date('M d, Y', strtotime($exam->created_at)) }}</td>
                                        <td class="center">{{ $exam->user_update->name }}</td>
                                        <td class="center">{{ date('M d, Y', strtotime($exam->updated_at)) }}</td>
                                        <td class="center">
                                            <a class="btn btn-info btn-xs"
                                               href="{{ route('exams.show',$exam->id) }}"><i
                                                        class="fa fa-external-link"></i> Show</a>
                                            <a class="btn btn-primary btn-xs"
                                               href="{{ route('exams.edit',$exam->id) }}"><i class="fa fa-edit"></i>
                                                Edit</a>
                                            <form action="{{ url('exams/exams/'.$exam->id) }}" method="POST"
                                                  style="display: inline-block">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" id="delete-task-{{ $exam->id }}"
                                                        class="btn btn-danger btn-xs">
                                                    <i class="fa fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                        @endrole
                                        @role('student')
                                        <td>
                                            <a class="btn btn-info"
                                               href="{{ url('exams/take'.'?eid='.$exam->id) }}"><i
                                                        class="fa fa-external-link"></i> Take Exam</a>
                                        </td>
                                        @endrole
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    @role('professor')
                                    <th>Name</th>
                                    @endrole
                                    @role('student')
                                    <th>Start Time</th>
                                    <th>End</th>
                                    @endrole
                                    <th>Level</th>
                                    <th>Course</th>
                                    <th>Created By</th>
                                    @role('professor')
                                    <th>Created At</th>
                                    <th>Updated By</th>
                                    <th>Updated At</th>
                                    @endrole
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
