<?php

use Illuminate\Support\Facades\Auth;

$user = Auth::user()->can('user-delete');

//$r = $user->can('profile-view');

//var_dump($user);
?>
@extends('layouts.home')
@section('title', 'Home')

@section('content')
    <div class="wrapper wrapper-content">
        <div class="container">
            <div class="row">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <section class="container features">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="navy-line"></div>
                            <h1>The Egyption School</h1>
                            <p>Educate the world</p>
                        </div>
                    </div>
                    <div class="row features-block">
                        <div class="col-lg-6 features-text wow fadeInLeft">
                            <small>The Egyption School</small>
                            <h2>About Us</h2>
                            <p>
                                The Egyption School Limited is an educational technology startup with offices in
                                Windsor, UK and in
                                Cairo, Egypt. We have over 300 staff members who are working on creating digital
                                educational products for students.
                            </p>
                        </div>
                        <div class="col-lg-6 text-right wow fadeInRight">
                            <img src="{{ asset('img/landing/bg.jpg') }}" alt="dashboard"
                                 class="img-responsive pull-right">
                        </div>
                    </div>
                </section>

                <section class="features">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <div class="navy-line"></div>
                                <h1>Even more great feautres</h1>
                            </div>
                        </div>
                        <div class="row features-block">
                            <div class="col-lg-3 features-text wow fadeInLeft">
                                <h2>Vision Statement</h2>
                                <p>
                                    Our vision is to be a leader in digital education and an innovator at the
                                    intersection of education, technology, and design.
                                </p>
                            </div>
                            <div class="col-lg-6 text-right m-t-n-lg wow zoomIn">
                                <img src="img/landing/iphone.jpg" class="img-responsive" alt="dashboard">
                            </div>
                            <div class="col-lg-3 features-text text-right wow fadeInRight">
                                <h2>Mission Statement </h2>
                                <p>
                                    Our mission is to educate the world.
                                </p>
                            </div>
                        </div>
                    </div>

                </section>

                <section id="testimonials" class="navy-section testimonials" style="margin-top: 0">

                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 text-center wow zoomIn">
                                <i class="fa fa-comment big-icon"></i>
                                <h1>
                                    What our users say
                                </h1>
                                <div class="testimonials-text">
                                    <i>"Many desktop publishing packages and web page editors now use Lorem Ipsum as
                                        their default model text, and a search for 'lorem ipsum' will uncover many web
                                        sites still in their infancy. Various versions have evolved over the years,
                                        sometimes by accident, sometimes on purpose (injected humour and the like)."</i>
                                </div>
                                <small>
                                    <strong>12.02.2014 - Andy Smith</strong>
                                </small>
                            </div>
                        </div>
                    </div>

                </section>

                <section id="contact" class="gray-section contact">
                    <div class="container">
                        <div class="row m-b-lg">
                            <div class="col-lg-12 text-center">
                                <div class="navy-line"></div>
                                <h1>Contact Us</h1>
                                <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>
                            </div>
                        </div>
                        <div class="row m-b-lg">
                            <div class="col-lg-3 col-lg-offset-3">
                                <address>
                                    <strong><span class="navy">Company name, Inc.</span></strong><br/>
                                    795 Folsom Ave, Suite 600<br/>
                                    San Francisco, CA 94107<br/>
                                    <abbr title="Phone">P:</abbr> (123) 456-7890
                                </address>
                            </div>
                            <div class="col-lg-4">
                                <p class="text-color">
                                    Consectetur adipisicing elit. Aut eaque, totam corporis laboriosam veritatis quis ad
                                    perspiciatis, totam corporis laboriosam veritatis, consectetur adipisicing elit quos
                                    non quis ad perspiciatis, totam corporis ea,
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <a href="mailto:test@email.com" class="btn btn-primary">Send us mail</a>
                                <p class="m-t-sm">
                                    Or follow us on social platform
                                </p>
                                <ul class="list-inline social-icon">
                                    <li><a href="#"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-2 text-center m-t-lg m-b-lg">
                                <p><strong>&copy; 2015 Company Name</strong><br/> consectetur adipisicing elit. Aut
                                    eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias
                                    ut unde.</p>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="js/plugins/wow/wow.min.js"></script>


    <script>

        $(document).ready(function () {

            $('body').scrollspy({
                target: '.navbar-fixed-top',
                offset: 80
            });

            // Page scrolling feature
            $('a.page-scroll').bind('click', function (event) {
                var link = $(this);
                $('html, body').stop().animate({
                    scrollTop: $(link.attr('href')).offset().top - 50
                }, 500);
                event.preventDefault();
                $("#navbar").collapse('hide');
            });
        });

        var cbpAnimatedHeader = (function () {
            var docElem = document.documentElement,
                header = document.querySelector('.navbar-default'),
                didScroll = false,
                changeHeaderOn = 200;

            function init() {
                window.addEventListener('scroll', function (event) {
                    if (!didScroll) {
                        didScroll = true;
                        setTimeout(scrollPage, 250);
                    }
                }, false);
            }

            function scrollPage() {
                var sy = scrollY();
                if (sy >= changeHeaderOn) {
                    $(header).addClass('navbar-scroll')
                }
                else {
                    $(header).removeClass('navbar-scroll')
                }
                didScroll = false;
            }

            function scrollY() {
                return window.pageYOffset || docElem.scrollTop;
            }

            init();

        })();

        // Activate WOW.js plugin for animation on scrol
        new WOW().init();

    </script>

@endsection
