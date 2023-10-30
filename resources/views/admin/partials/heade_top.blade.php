<header class="main-header">

  <!-- Logo -->
  <a href="{{ route('home.index') }}" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->

    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>{{ config('app.name') }}</b></span>
  </a>

  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- Messages: style can be found in dropdown.less-->
{{--        <li class="dropdown messages-menu">--}}
{{--          <a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
{{--            <i class="fa fa-envelope-o"></i>--}}
{{--            <span class="label label-success">4</span>--}}
{{--          </a>--}}
{{--          <ul class="dropdown-menu">--}}
{{--            <li class="header">You have 4 messages</li>--}}
{{--            <li>--}}
{{--              <!-- inner menu: contains the actual data -->--}}
{{--              <ul class="menu">--}}
{{--                <li><!-- start message -->--}}
{{--                  <a href="#">--}}
{{--                    <div class="pull-left">--}}
{{--                    <img src="{{ asset("adminlte/dist/img/user2-160x160.jpg") }}" class="img-circle" alt="User Image">--}}
{{--                    </div>--}}
{{--                    <h4>--}}
{{--                      Support Team--}}
{{--                      <small><i class="fa fa-clock-o"></i> 5 mins</small>--}}
{{--                    </h4>--}}
{{--                    <p>Why not buy a new awesome theme?</p>--}}
{{--                  </a>--}}
{{--                </li>--}}
{{--                <!-- end message -->--}}
{{--              </ul>--}}
{{--            </li>--}}
{{--            <li class="footer"><a href="#">See All Messages</a></li>--}}
{{--          </ul>--}}
{{--        </li>--}}
        <!-- Notifications: style can be found in dropdown.less -->
{{--        <li class="dropdown notifications-menu">--}}
{{--          <a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
{{--            <i class="fa fa-bell-o"></i>--}}
{{--            <span class="label label-warning">10</span>--}}
{{--          </a>--}}
{{--          <ul class="dropdown-menu">--}}
{{--            <li class="header">You have 10 notifications</li>--}}
{{--            <li>--}}
{{--              <!-- inner menu: contains the actual data -->--}}
{{--              <ul class="menu">--}}
{{--                <li>--}}
{{--                  <a href="#">--}}
{{--                    <i class="fa fa-users text-aqua"></i> 5 new members joined today--}}
{{--                  </a>--}}
{{--                </li>--}}

{{--              </ul>--}}
{{--            </li>--}}
{{--            <li class="footer"><a href="#">View all</a></li>--}}
{{--          </ul>--}}
{{--        </li>--}}
        <!-- Tasks: style can be found in dropdown.less -->
        <li class="dropdown tasks-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-language"></i>
            <span class="label label-danger"></span>
          </a>
          <ul class="dropdown-menu">
            <li class="header">Language</li>
            <li>
              <!-- inner menu: contains the actual data -->
              <ul class="menu">
                  <li>
                      <a style="padding-left: 25px" href="{{ route('lang',['lang' => 'vi']) }}">VI</a>
                  </li>
                  <li>
                      <a style="padding-left: 25px" href="{{ route('lang',['lang' => 'ja']) }}">JA</a>
                  </li>
                  <li>
                      <a style="padding-left: 25px" href="{{ route('lang',['lang' => 'ko']) }}">Korea</a>
                  </li>
                  <li>
                      <a style="padding-left: 25px" href="{{ route('lang',['lang' => 'zh']) }}">TQ</a>
                  </li>
                  <li>
                      <a style="padding-left: 25px" href="{{ route('lang',['lang' => 'ka']) }}">Georgian</a>
                  </li>
                  <li>
                      <a style="padding-left: 25px" href="{{ route('lang',['lang' => 'en']) }}">EN</a>
                  </li>
                <!-- end task item -->
              </ul>
            </li>

          </ul>
        </li>

        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            {{-- <img src={{ asset("adminlte/dist/img/user2-160x160.jpg") }} class="user-image" alt="User Image">--}}
            <span class="hidden-xs">{{ !empty(Auth::user()->name) ? Auth::user()->name : '' }}</span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
                <img class="profile-user-img img-responsive img-circle"
                     @if (!empty(Auth::user()->avatar))
                     src="{{ asset('storage/' . Auth::user()->avatar) }}"
                     @else
                     src="{{ asset('storage/adminlte/dist/img/avatar5.png') }}"
                     @endif
                     alt="User profile picture">

              <p>
                  {{ Auth::user()->name ?? Auth::user()->name }}
                  <small></small>
              </p>
            </li>

            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                  <a href="{{ route('profile', Auth::id()) }}" class="btn btn-default btn-flat">Thông tin</a>
              </div>
              <div class="pull-right">
                    <a href="{{ route('logout.post') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit(); " class="btn btn-default btn-flat">
                  <form id="logout-form" action="{{ route('logout.post') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
                  Đăng xuất
                </a>
              </div>
            </li>
          </ul>
        </li>
        <!-- Control Sidebar Toggle Button -->
{{--        <li>--}}
{{--          <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>--}}
{{--        </li>--}}
      </ul>
    </div>

  </nav>
</header>
