<div class="row border-bottom white-bg">
    <nav class="navbar navbar-static-top" role="navigation">
        <div class="navbar-header">
            <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse"
                    class="navbar-toggle collapsed" type="button">
                <i class="fa fa-reorder"></i>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'The Egyptian School') }}
            </a>
        </div>
        <div class="navbar-collapse collapse" id="navbar">
            <ul class="nav navbar-nav">
            {{--
                <li class="active">
                    <a aria-expanded="false" role="button" href="{{ url('/') }}"> Home</a>
                </li>
            <li class="dropdown">
                <a aria-expanded="false" role="button" href="#" class="dropdown-toggle"
                   data-toggle="dropdown"> Menu item <span class="caret"></span></a>
                <ul role="menu" class="dropdown-menu">
                    <li><a href="">Menu item</a></li>
                    <li><a href="">Menu item</a></li>
                    <li><a href="">Menu item</a></li>
                    <li><a href="">Menu item</a></li>
                </ul>
            </li>
            --}}
            <!-- Authentication Links -->
            @if (!Auth::guest())
                <!-- ADD ROLES AND USERS LINKS -->
                    @role('admin')
                    <li><a href="{{ route('roles.index') }}">Roles</a></li>
                    <li><a href="{{ route('users.index') }}">Users</a></li>
                    <li><a href="{{ route('courses.index') }}">Courses</a></li>
                    <li><a href="{{ route('schedules.index') }}">Schedules</a></li>
                    <li><a href="{{ route('posts.index') }}">Feedback</a></li>
                    @endrole

                    @role('professor')
                    <li><a href="{{ route('courses.index') }}">My Courses</a></li>
                    <li><a href="{{ route('schedules.index') }}">Schedules</a></li>
                    <li><a href="{{ route('questions.index') }}">Question Bank</a></li>
                    <li><a href="{{ route('exams.index') }}">Exams</a></li>
                    <li><a href="{{ route('posts.index') }}">Feedback</a></li>
                    @endrole

                    @role('student')
                    <li><a href="{{ route('courses.index') }}">My Courses</a></li>
                    <li><a href="{{ route('schedules.index') }}">My Schedule</a></li>
                    <li><a href="{{ route('exams.index') }}">My Exams</a></li>
                    <li><a href="{{ route('posts.index') }}">Feedback</a></li>
                    <li><a href="{{ route('activity.index') }}">Activity</a></li>
                    @endrole

                    @role('parent')
                    <li><a href="{{ url('student') }}">My Student</a></li>
                    <li><a href="{{ route('posts.index') }}">Feedback</a></li>
                    @endrole

                @endif
            </ul>
            <ul class="nav navbar-top-links navbar-right">
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('profile') }}">
                                    <i class="fa fa-user-md"></i> My Profile
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i> Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
</div>
