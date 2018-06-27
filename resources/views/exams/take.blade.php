<?php

use App\Exam;
use App\Question;
use App\Course;
use Illuminate\Support\Facades\Input;

$exam = Exam::find(Input::get('eid'));
$course_id = $exam['course_id'];
//var_dump($course_id);
$course = new Course();
$questions = $course->questions($course_id);
//var_dump($questions);

?>
@extends('layouts.master')

@section('title', 'Take Exam')

@section('css')
    <link href="{{ asset('css/plugins/iCheck/custom.css')}}" rel="stylesheet">
@endsection
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-sm-4">
                <h2>Take Exam</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="active">
                        <strong>Take Exam</strong>
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

                        <p class="" style="text-align: center; font-size: xx-large;" id="demo"></p>

                        <form class="form-horizontal" role="form" method="POST"
                              action="{{ url('exams/submit') }}">
                            {{ csrf_field() }}

                            <input id="questions" type="hidden" class="form-control" name="questions"
                                   value="{{ $questions }}" required>

                            <div class="col-lg-12">
                                @foreach ($questions as $key => $question)
                                    <div class="col-lg-6">
                                        <div class="ibox-content">
                                            <h4>{{ ++$key.'- '.$question->question }}</h4>
                                            <ul class="todo-list m-t small-list ui-sortable">
                                                <li>
                                                    <div class="i-checks"><label class="">
                                                            <div class="iradio_square-green"
                                                                 style="position: relative;">
                                                                <input type="radio" value="1"
                                                                       name="{{ 'o_'.$question->id }}">
                                                            </div>
                                                            <i></i> {{ $question->option1 }}</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="i-checks"><label>
                                                            <div class="iradio_square-green"
                                                                 style="position: relative;">
                                                                <input type="radio" value="2"
                                                                       name="{{ 'o_'.$question->id }}">
                                                            </div>
                                                            <i></i> {{ $question->option2 }}</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="i-checks"><label class="">
                                                            <div class="iradio_square-green"
                                                                 style="position: relative;">
                                                                <input type="radio" value="3"
                                                                       name="{{ 'o_'.$question->id }}">
                                                            </div>
                                                            <i></i> {{ $question->option3 }}</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="i-checks"><label>
                                                            <div class="iradio_square-green"
                                                                 style="position: relative;">
                                                                <input type="radio" value="4"
                                                                       name="{{ 'o_'.$question->id }}">
                                                            </div>
                                                            <i></i> {{ $question->option4 }}</label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-lg-12 col-lg-offset-2">
                                <hr/>
                                <button type="submit" class="btn btn-primary"> Submit Exam</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        Date.prototype.addHours = function (h) {
            this.setHours(this.getHours() + h);
            return this;
        }

        // Set the date we're counting down to
        //var countDownDate = new Date("Aug 1, 2018 15:00:00").getTime();
        var t = new Date().addHours(2);
        var countDownDate = t.getTime();

        // Update the count down every 1 second
        var x = setInterval(function () {

            // Get todays date and time
            var now = new Date().getTime();

            // Find the distance between now an the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Output the result in an element with id="demo"
            document.getElementById("demo").innerHTML = hours + "h "
                + minutes + "m " + seconds + "s ";

            // If the count down is over, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("demo").innerHTML = "EXPIRED";
            }
        }, 1000);
    </script>

    <!-- jquery UI -->
    <script src="{{asset('js/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

    <!-- Touch Punch - Touch Event Support for jQuery UI -->
    <script src="{{asset('js/plugins/touchpunch/jquery.ui.touch-punch.min.js')}}"></script>

    <!-- iCheck -->
    <script src="{{asset('js/plugins/iCheck/icheck.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>

    <!-- Jvectormap -->
    <script src="{{asset('js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{asset('js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>

    <!-- Flot -->
    <script src="{{asset('js/plugins/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('js/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{asset('js/plugins/flot/jquery.flot.resize.js')}}"></script>
@endsection
