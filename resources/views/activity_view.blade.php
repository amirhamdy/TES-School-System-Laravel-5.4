@extends('layouts.master')

@section('title', 'View Activity')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-sm-4">
                <h2>Activity details</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="active">
                        <strong>Activity details</strong>
                    </li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Video description</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content profile-content">
                        <h4><strong>Checkerboard Play</strong></h4>
                        <p><i class="fa fa-clock-o"></i> Uploaded on Mar 27, 2018</p>
                        <h5>
                            Science and Technology
                        </h5>
                        <p>
                            In the mini story book titled My Friend, the two animal friends enjoy playing checkers
                            together. This is a great opportunity to make a connection between the events in the story
                            and checkerboard play that challenges students to use spatial reasoning and computational
                            thinking. There’s no need to teach students the rules of checkers to provide the benefits of
                            checkerboard play. Simply using a checkerboard as a play surface will provide a provocation
                            for learning.
                            <br/>
                        </p>
                        <div class="bottom-text">
                            <h3 dir="ltr"><span id="docs-internal-guid-c1997a9b-660a-10c0-5e19-7d35b7f67da2">What You Need</span>
                            </h3>

                            <ul dir="ltr">
                                <li><span>Checkerboard</span></li>
                                <li>Small blocks and/or toy figures</li>
                            </ul>


                            <div class="ad-contents ">
                                <div id="div-gpt-ad-Edcom_Bottom_Horizontal" class="box ad " data-parent="">
                                    <script>
                                        if (window.innerWidth) {
                                            window.googletag.cmd.push(function () {
                                                window.googletag.display('div-gpt-ad-Edcom_Bottom_Horizontal');
                                            });
                                        }
                                    </script>
                                </div>
                            </div>
                            <h3 dir="ltr"><span
                                        id="docs-internal-guid-c1997a9b-660a-10c0-5e19-7d35b7f67da2">What You Do</span>
                            </h3>

                            <ol dir="ltr">
                                <li><span>Invite students to play in pairs with small toys, such as blocks or toy figures (animals, dinosaurs, people, etc.) on the surface of a checkerboard.</span>
                                </li>
                                <li>Allow students to play in whatever way they choose and observe them to see how their
                                    play develops.
                                </li>
                                <li>You will likely observe that when students play on a checkerboard surface, they tend
                                    to organize and move the toys in a linear fashion.
                                </li>
                                <li>After they have had some time to develop their play scenarios, ask them to reflect
                                    on and discuss the experience. “How is playing on a checkerboard different from
                                    playing on a plain tabletop?”
                                </li>
                                <li>Write down the students’ reflections. Ask follow-up questions that challenge
                                    students to describe how they moved the toys from space to space. Was there a
                                    pattern? Were there rules?
                                </li>
                            </ol>

                            <p>&nbsp;</p>

                            <p><em>Ann Gadzikowski is an author and educator with a passion for challenging children to
                                    think creatively and critically. Her recent book Robotics for Young Children won the
                                    2018 Midwest Book Award for best educational book. Ann developed her expertise in
                                    robotics, computer science, and engineering through her work as early childhood
                                    coordinator for Northwestern University’s&nbsp;Center for Talent Development. She
                                    has over 25 years of experience as a teacher and director of early childhood
                                    programs, and currently serves as the Executive Director of <a
                                            href="https://preschoolofthearts.com/" target="_blank">Preschool of the
                                        Arts</a>, a Reggio-Emilia inspired school in Madison, Wisconsin.</em></p></div>
                        <div class="row m-t-md">
                            <div class="col-md-3">
                                <h5><strong>169</strong> Likes</h5>
                            </div>
                            <div class="col-md-9">
                                <h5><strong>28</strong> Comments</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Video window</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <figure>
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/g3IiUODPUbo"
                                    frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </figure>
                    </div>
                    <div class="ibox-content">
                        <figure>
                            {{--
                                                        <iframe width="425" height="349" src="http://www.youtube.com/embed/bwj2s_5e12U"
                                                                frameborder="0" allowfullscreen></iframe>
                            --}}
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/kRN60hx2ZVg"
                                    frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).on('webkitfullscreenchange mozfullscreenchange fullscreenchange', function (e) {
            $('body').hasClass('fullscreen-video') ? $('body').removeClass('fullscreen-video') : $('body').addClass('fullscreen-video')
        });
    </script>
@endsection