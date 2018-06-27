<?php
$act_name = array(
    "Make a Cereal Box House",
    "Sen-Tense Card Game",
    "Make a Cat in the Hat",
    "Create Line Design Prints",
    "Make a Dr. Seuss Story Box!",
    "Checkerboard Play",
    "Superhero Research Project",
    "Make a Spice Tin Pencil Holder",
    "Blow the House Down with Robotics",
    "Play an ABC Balloon Game",
    "Try a Cat in the Hat",
    "Summer Community Helpers",
);
$i = 1;
?>
@extends('layouts.master')

@section('title', 'Activity')

@section('css')
@endsection

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-sm-4">
                <h2>Activities list</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="active">
                        <strong>Activities list</strong>
                    </li>
                </ol>
            </div>
        </div>

        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">

                @foreach($act_name as $key => $name)
                    <div class="col-lg-3">
                        <div class="contact-box center-version">
                            <a href="{{ url('activity_view') }}">
                                <img alt="image" class="img-circle" src="{{ asset('img/a'.$i.'.jpg') }}">
                                <h3 class="m-b-xs"><strong>{{ $name }}</strong></h3>
                                <address class="m-t-md">
                                    Recycle your cereal boxes and engage your child's creativity with this fun arts and
                                    crafts project.
                                </address>
                            </a>
                            <div class="contact-box-footer">
                                <div class="m-t-xs btn-group">
                                    <a class="btn btn-xs btn-white"><i class="fa fa-phone"></i> View </a>
                                    <a class="btn btn-xs btn-success"><i class="fa fa-user-plus"></i> Enroll</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $i++; ?>
                @endforeach

            </div>
        </div>

    </div>
@endsection

