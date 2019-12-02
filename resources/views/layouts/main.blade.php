<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta
      content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no"
      name="viewport"
    />


    <title>@yield('title')</title>

    <!-- Fonts -->
  <!--     Fonts and icons     -->
  <link
      href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
      integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
      crossorigin="anonymous"
    />
    <!-- CSS Files -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/now-ui-dashboard.css?v=1.3.0') }}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('assets/demo/demo.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/demo/style.css') }}" rel="stylesheet" />

    </head>

  <body>
    <div class="wrapper ">
      <div class="sidebar" data-color="blue">
        <div class="sidebar-wrapper" id="sidebar-wrapper">
          <ul class="nav">
            <li>
              <a href="/" class="text-center">
                <p>Нүүр</p>
              </a>
            </li>
            <li class="{{ Request::is('login') ? 'active' : '' }}">
              <a href="/login" class="text-center">
                <p>Нэвтрэх</p>
              </a>
            </li>
            <li class="{{ Request::is('register') ? 'active' : '' }}">
              <a href="/register" class="text-center">
                <p>
                  Бүртгүүлэх
                </p>
              </a>
            </li>
            <li class="active-pro text-center">
              <a href="#">
                <p>Тухай</p>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="main-panel" id="main-panel">
        <!-- Navbar -->
        <nav
          class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute"
        >
          <div class="container-fluid">
            <div class="navbar-wrapper">
              <div class="navbar-toggle">
                <button type="button" class="navbar-toggler">
                  <span class="navbar-toggler-bar bar1"></span>
                  <span class="navbar-toggler-bar bar2"></span>
                  <span class="navbar-toggler-bar bar3"></span>
                </button>
              </div>
              <a class="navbar-brand" href="#">@yield('title')</a>
            </div>
            <button
              class="navbar-toggler"
              type="button"
              data-toggle="collapse"
              data-target="#navigation"
              aria-controls="navigation-index"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="navbar-toggler-bar navbar-kebab"></span>
              <span class="navbar-toggler-bar navbar-kebab"></span>
              <span class="navbar-toggler-bar navbar-kebab"></span>
            </button>
            <div
              class="collapse navbar-collapse justify-content-end"
              id="navigation"
            >
              <ul class="navbar-nav">
                <li class="nav-item dropdown">
                  <a
                    class="nav-link dropdown-toggle"
                    id="navbarDropdownMenuLink"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                    <i class="now-ui-icons users_single-02"></i>
                    <p>
                      <span class="d-lg-none d-md-block">Хэрэглэч</span>
                    </p>
                  </a>
                  <div
                    class="dropdown-menu dropdown-menu-right"
                    aria-labelledby="navbarDropdownMenuLink"
                  >
                    <a class="dropdown-item" href="/login">Нэвтрэх</a>
                    <a class="dropdown-item" href="/register">Бүртгүүлэх</a>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <!-- End Navbar -->
        <div class="panel-header panel-header-sm"></div>
        <div class="content">
              @yield('content')
        </div>
     </div>
    </div>
    <!--   Core JS Files   -->
    <script src="{{ asset('assets/js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{ asset('assets/js/plugins/bootstrap-notify.js') }}"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script
      src="{{ asset('assets/js/now-ui-dashboard.min.js?v=1.3.0') }}"
      type="text/javascript"
    ></script>
    <script src="{{ asset('assets/demo/demo.js') }}"></script>
  </body>
</html>
