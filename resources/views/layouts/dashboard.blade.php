<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    @yield('title')
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/now-ui-dashboard.css?v=1.3.0') }}" rel="stylesheet" />
  <link href="{{ asset('assets/demo/demo.css') }}" rel="stylesheet" />
  <script src="{{ asset('assets/js/core/jquery.min.js') }}"></script>
</head>

<body class="notary">
  <div class="wrapper">
    <div class="sidebar" data-color="blue">
      <div class="logo">
        <a href="/profile" class="simple-text logo-normal text-center"> {{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}</a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
            <a href="/dashboard">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="{{ Request::is('request') ? 'active' : '' }}" style="display: {{Auth::user()->type == 3 ? '' : 'none'}}">
            <a href="/request">
              <i class="now-ui-icons ui-1_bell-53"></i>
              <p>Хүсэлтүүд</p>
            </a>
          </li>
          <li class="{{ Request::is('contract') ? 'active' : '' }}">
            <a href="/contract">
              <i class="now-ui-icons education_paper"></i>
              <p>Маягтууд</p>
            </a>
          </li>
          <li class="{{ Request::is('profile') ? 'active' : '' }}" style="display: {{Auth::user()->type == 3 ? 'none' : ''}}">
            <a href="/profile">
              <i class="now-ui-icons users_single-02"></i>
              <p>Бүртгэл</p>
            </a>
          </li>
          <li class="{{ Request::is('user') ? 'active' : '' }}" style="display: {{Auth::user()->type == 3 ? '' : 'none'}}">
            <a href="/user">
              <i class="now-ui-icons users_circle-08"></i>
              <p>Бүх хэрэглэгч</p>
            </a>
          </li>
          <li class="{{ Request::is('confirm') ? 'active' : '' }} active-pro" style="display: {{Auth::user()->type == 1 ? '' : 'none'}}">
            <a href="/confirm">
              <i class="now-ui-icons education_agenda-bookmark"></i>
              <p>Нотариат болох</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="/dashboard">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Хэрэглэгч</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="/profile">Бүртгэл</a>
                  <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                      Системээс гарах
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                     @csrf
                  </form>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="panel-header panel-header-sm">
      </div>
      <!-- End Header -->
      <div class="content">
        <div class="row">
            @yield('content')
        </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
  <!-- Chart JS -->
  <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset('assets/js/plugins/bootstrap-notify.js') }}"></script>

  <script src="{{ asset('assets/js/now-ui-dashboard.min.js?v=1.3.0') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/js/core/jQuery.print.min.js') }}"></script>

  <script src="{{ asset('assets/demo/demo.js') }}"></script>
  <script src="{{Request::is('user') ? asset('assets/js/admin/users.js'): ''}}"></script>
  <script src="{{Request::is('request') ? asset('assets/js/admin/request.js'): ''}}"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      // demo.initDashboardPageCharts();

      $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      })
      @if(Auth::user()->type == 2 && Auth::user()->confirmed == 0 && Request::is('confirm') !== true)
      $.notify({
        icon: "add_alert",
        message: "Таны бүртгэл баталгаажаагүй байна.</br><b><a href='/confirm' class='text-white'>энд дарж</a></b> бүртгэлээ баталгаажуулна уу!"

        },{
          type: 'danger',
          timer: 100000,
          placement: {
              from: 'top',
              align: 'center'
          }
        });
        @endif
    });
  </script>
</body>

</html>