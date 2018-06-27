<?php

use App\Exam;
use App\Question;
use App\Course;
use Illuminate\Support\Facades\Input;

$json = $input['questions'];
$questions = json_decode($json, JSON_FORCE_OBJECT);
//print_r($questions[1]);
//print_r($input);
//die();
?>
@extends('layouts.master')

@section('title', 'Take Result')

@section('css')
    <link href="{{ asset('css/plugins/iCheck/custom.css')}}" rel="stylesheet">
@endsection
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-sm-4">
                <h2>Exam Result</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="active">
                        <strong>Exam Result</strong>
                    </li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content animated fadeInUp">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Results</h5>
                        </div>
                        <div class="ibox-content">
                            <div class="project-list">
                                <table class="table table-hover">
                                    <tbody>
                                    <tr>
                                        <td class="project-title">Question</td>
                                        <td class="project-title">Your Answer</td>
                                        <td class="project-title">Result</td>
                                    </tr>
                                    @foreach($questions as $key => $question)
                                        <tr>
                                            <td class="project-title">{{ $question['question'] }}</td>
                                            <td class="project-completion">{{ $question['option'.$input['o_'.$question['id']]] }}</td>
                                            @if($input['o_'.$question['id']] == $question['answer'])
                                                <td class="project-status"><span
                                                            class="label label-primary">Correct</span></td>
                                            @else
                                                <td class="project-status"><span
                                                            class="label label-danger">False</span></td>
                                            @endif
                                        </tr>
                                    @endforeach
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

@section('scripts')
    <script>
        // Set the date we're counting down to
        var countDownDate = new Date("Jun 1, 2018 15:00:00").getTime();

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
