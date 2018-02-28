<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Kaabag Organization">
  <meta name="author" content="Julius Angcon Garcia">
  <meta name="keyword" content="Cebu 6th District Project, Community Records">
  <link rel="shortcut icon" href="img/favicon.png">
  <title>{{ Config::get("app.name") }} | @yield('html_title')</title>

  <!-- Icons -->
  <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

  <!-- Main styles for this application -->
  <link href="{{ asset('css/style.min.css') }}" rel="stylesheet">
  <!-- Styles required by this views -->

  <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">
  <link href="{{ asset('css/main.css') }}" rel="stylesheet">

</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">

  <header class="app-header navbar">
    <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button">
      <span class="navbar-toggler-icon"></span>
    </button>

    <ul class="nav navbar-nav ml-auto">
      <li class="nav-item dropdown">
        {{ Auth::user()->email }}
      </li>
    </ul>
    <button class="navbar-toggler aside-menu-toggler" type="button">
      <span class="navbar-toggler-icon"></span>
    </button>

  </header>

    <div class="app-body">
      <div class="sidebar">
        <nav class="sidebar-nav">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link nav-link-success" href="{{url('home')}}"><i class="icon-speedometer"></i> Dashboard </a><!-- <span class="badge badge-primary">NEW</span></a> -->
            </li>
            
            <li class="nav-title">
             PROFILE
            </li>
            <li class="nav-item">
              <a href="{{ url('member/'.Auth::user()->id) }}" class="nav-link"><i class="fa fa-id-card"></i> My Info </a>
            </li>

			@if (Common::getUserType() == Common::USER_ADMIN)
            <!-- Admin panel -->
            <li class="nav-title">
              ADD
            </li>
            <li class="nav-item">
              <a href="{{ url('member/create') }}" class="nav-link"><i class="fa fa-user-plus"></i> Add Member </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('member/create_encoder') }}" class="nav-link"><i class="fa fa-plus-circle"></i> Add Encoder</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('member/create_sector_president') }}" class="nav-link"><i class="fa fa-plus-square"></i> Add Sector President</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('member/create_admin') }}" class="nav-link"><i class="fa fa-user-secret"></i> Add Kaabag Admin</a>
            </li>
            <li class="nav-title">
              REPORTS
            </li>
            <li class="nav-item">
              <a class="nav-link" href="charts.html"><i class="fa fa-align-justify"></i> Charts</a>
            </li>
            <li class="divider"></li>
            <!-- End admin panel -->
            @elseif (Common::getUserType() == Common::USER_SECTOR_PRESIDENT)
            <li class="nav-title">
              ADD
            </li>
            <li class="nav-item">
              <a href="{{ url('member/create_encoder') }}" class="nav-link"><i class="fa fa-plus-circle"></i> Add Encoder</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('member/create') }}" class="nav-link"><i class="fa fa-user-plus"></i> Add Member </a>
            </li>
            @elseif (Common::getUserType() == Common::USER_ENCODER)
            <li class="nav-title">
              ADD
            </li>
            <li class="nav-item">
              <a href="{{ url('member/create') }}" class="nav-link"><i class="fa fa-user-plus"></i> Add Member </a>
            </li>
            @else
            <!--  User panel here... -->
			@endif
          </ul>
        </nav>
        <button class="sidebar-minimizer brand-minimizer" type="button"></button>
      </div>

      <!-- Main content -->
      <main class="main">

        <div class="container-fluid blade-container">

          @yield('content')

        </div>
        <!-- /.conainer-fluid -->
      </main>

      <aside class="aside-menu">
        
        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane active" id="timeline" role="tabpanel">
            <div class="callout m-0 py-2 text-muted text-center bg-light text-uppercase">
              <small>
              <strong>
              	<a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
              </strong>
              </small>
            </div>
            <hr class="transparent mx-3 my-0">
            <!-- 
            <div class="callout callout-warning m-0 py-3">
              <div class="avatar float-right">
                <img src="img/avatars/7.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
              </div>
              <div>Meeting with
                <strong>Lucas</strong>
              </div>
              <small class="text-muted mr-3"><i class="icon-calendar"></i>&nbsp; 1 - 3pm</small>
              <small class="text-muted"><i class="icon-location-pin"></i>&nbsp; Palo Alto, CA </small>
            </div>
            <hr class="mx-3 my-0">
            <div class="callout callout-info m-0 py-3">
              <div class="avatar float-right">
                <img src="img/avatars/4.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
              </div>
              <div>Skype with
                <strong>Megan</strong>
              </div>
              <small class="text-muted mr-3"><i class="icon-calendar"></i>&nbsp; 4 - 5pm</small>
              <small class="text-muted"><i class="icon-social-skype"></i>&nbsp; On-line </small>
            </div>
            <hr class="transparent mx-3 my-0">
            <div class="callout m-0 py-2 text-muted text-center bg-light text-uppercase">
              <small><b>Tomorrow</b></small>
            </div>
            <hr class="transparent mx-3 my-0">
            <div class="callout callout-danger m-0 py-3">
              <div>New UI Project -
                <strong>deadline</strong>
              </div>
              <small class="text-muted mr-3"><i class="icon-calendar"></i>&nbsp; 10 - 11pm</small>
              <small class="text-muted"><i class="icon-home"></i>&nbsp; creativeLabs HQ </small>
              <div class="avatars-stack mt-2">
                <div class="avatar avatar-xs">
                  <img src="img/avatars/2.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                </div>
                <div class="avatar avatar-xs">
                  <img src="img/avatars/3.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                </div>
                <div class="avatar avatar-xs">
                  <img src="img/avatars/4.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                </div>
                <div class="avatar avatar-xs">
                  <img src="img/avatars/5.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                </div>
                <div class="avatar avatar-xs">
                  <img src="img/avatars/6.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                </div>
              </div>
            </div>
            <hr class="mx-3 my-0">
            <div class="callout callout-success m-0 py-3">
              <div>
                <strong>#10 Startups.Garden</strong> Meetup</div>
              <small class="text-muted mr-3"><i class="icon-calendar"></i>&nbsp; 1 - 3pm</small>
              <small class="text-muted"><i class="icon-location-pin"></i>&nbsp; Palo Alto, CA </small>
            </div>
            <hr class="mx-3 my-0">
            <div class="callout callout-primary m-0 py-3">
              <div>
                <strong>Team meeting</strong>
              </div>
              <small class="text-muted mr-3"><i class="icon-calendar"></i>&nbsp; 4 - 6pm</small>
              <small class="text-muted"><i class="icon-home"></i>&nbsp; creativeLabs HQ </small>
              <div class="avatars-stack mt-2">
                <div class="avatar avatar-xs">
                  <img src="img/avatars/2.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                </div>
                <div class="avatar avatar-xs">
                  <img src="img/avatars/3.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                </div>
                <div class="avatar avatar-xs">
                  <img src="img/avatars/4.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                </div>
                <div class="avatar avatar-xs">
                  <img src="img/avatars/5.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                </div>
                <div class="avatar avatar-xs">
                  <img src="img/avatars/6.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                </div>
                <div class="avatar avatar-xs">
                  <img src="img/avatars/7.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                </div>
                <div class="avatar avatar-xs">
                  <img src="img/avatars/8.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                </div>
              </div>
            </div>
            <hr class="mx-3 my-0">
            -->
          </div>

        </div>
      </aside>

    </div>

    <footer class="app-footer">
      <span><a href="http://kaabab.org">Kaabag Org</a> &copy; {{date('Y')}}.</span>
      <!-- <span class="ml-auto">Powered by <a href="http://cebushopping.com">CebuShopping</a></span> -->
    </footer>

    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery-ui.js') }}"></script>

    <!-- Bootstrap and necessary plugins -->
    <script src="{{ asset('js/views/popovers.js') }}"></script>
    <script src="{{ asset('js/tether.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/pace.min.js') }}"></script>

    <!-- CoreUI main scripts -->

    <script src="{{ asset('js/app_admin_theme.js') }}"></script>

    @yield('javascript')

  </body>
  </html>
