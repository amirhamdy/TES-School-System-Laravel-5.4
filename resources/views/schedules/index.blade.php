@extends('layouts.master')

@section('title', 'Schedules')

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
                        <h5>Schedules Table Data</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Start</th>
                                    <th>End</th>
                                    <th>Level</th>
                                    <th>Exam</th>
                                    <th>Created By</th>
                                    <th>Created At</th>
                                    <th>Updated By</th>
                                    <th>Updated At</th>
                                    <th></th>
                                </tr>
                                </thead>
                                @role('admin')
                                <a href="{{ route('schedules.create') }}" class="btn btn-success">New Schedule</a>
                                @endrole
                                <tbody>
                                @foreach ($schedules as $key => $schedule)
                                    <tr class="gradeX">
                                        <td class="center">{{ $schedule->id }}</td>
                                        @role('admin')
                                        <td class="center">{{ date('g:i A \o\n d M', strtotime($schedule->start)) }}</td>
                                        <td class="center">{{ date('g:i A \o\n d M', strtotime($schedule->end)) }}</td>
                                        @endrole
                                        @role('student')
                                        <td class="center">{{ date('g:i A \o\n d M, Y', strtotime($schedule->start)) }}</td>
                                        <td class="center">{{ date('g:i A \o\n d M, Y', strtotime($schedule->end)) }}</td>
                                        @endrole
                                        @role('professor')
                                        <td class="center">{{ date('g:i A \o\n d M, Y', strtotime($schedule->start)) }}</td>
                                        <td class="center">{{ date('g:i A \o\n d M, Y', strtotime($schedule->end)) }}</td>
                                        @endrole
                                        <td class="center">{{ 'Level '.$schedule->level }}</td>
                                        <td class="center">{{ $schedule->exam->name }}</td>
                                        <td class="center">{{ $schedule->user->name }}</td>
                                        <td class="center">{{ date('M d, Y', strtotime($schedule->created_at)) }}</td>
                                        <td class="center">{{ $schedule->user_update->name }}</td>
                                        <td class="center">{{ date('M d, Y', strtotime($schedule->updated_at)) }}</td>
                                        @role('admin')
                                        <td class="center">
                                            {{--<a class="btn btn-info btn-xs"
                                               href="{{ route('schedules.show',$schedule->id) }}"><i
                                                        class="fa fa-external-link"></i> Show</a>
                                            --}}
                                            <a class="btn btn-primary btn-xs"
                                               href="{{ route('schedules.edit',$schedule->id) }}"><i
                                                        class="fa fa-edit"></i>
                                                Edit</a>
                                            <form action="{{ url('schedules/schedules/'.$schedule->id) }}" method="POST"
                                                  style="display: inline-block">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" id="delete-task-{{ $schedule->id }}"
                                                        class="btn btn-danger btn-xs">
                                                    <i class="fa fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                        @endrole
                                        @role('student')
                                        <td class="center"></td>
                                        @endrole
                                        @role('professor')
                                        <td class="center"></td>
                                        @endrole
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Start</th>
                                    <th>End</th>
                                    <th>Level</th>
                                    <th>Exam</th>
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
