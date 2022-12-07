<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', config('app.name'))</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'">
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/demo.css')}}">
    <link rel="stylesheet" href="{{ asset('fonts/nucleo-icons.css')}}">
    <link rel="stylesheet" href="sweetalert2.min.css">
    <link rel="stylesheet" href="/docs/3.0/assets/css/highlighter.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @yield('css')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">


<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown mt-2">
                <a class="navbar-link" data-toggle="dropdown" data-bs-toggle="dropdown">
                    <i class="fas fa-bell"></i>
                  @empty($reservations->count() == 0)
                    <span class="badge badge-danger navbar-badge">{{$reservations->count()}}</span>
                @endempty
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                  <span class="dropdown-item dropdown-header text-center">RESERVATIONS</span>
                  <div class="dropdown-divider"></div>
                  <a href="{{route('reservation.index')}}" class="dropdown-item"><i class="fas fa-ticket-alt text-warning"></i> Not Confirmed Reservations <span class="badge badge-primary">{{ $reservations->count()}}</span></a>
               </div>
            </li>

            <li class="nav-item dropdown mt-2">
            <a class="navbar-link mx-4" data-toggle="dropdown" data-bs-toggle="dropdown">
                <i class="fas fa-comment text-warning"></i>
              @empty($contacts->count() == 0)
                <span class="badge badge-danger navbar-badge">{{$contacts->count()}}</span>
            @endempty
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <span class="dropdown-item dropdown-header text-center">CONCERNS</span>
              <div class="dropdown-divider"></div>
              <a href="{{route('contact.index')}}" class="dropdown-item dropdown-footer"><i class="fas fa-check text-warning"></i> Read Messages<span class="badge badge-primary">{{ $contacts->count()}}</a>
            </div>
        </li>
        
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" data-bs-toggle="dropdown">
                <img src="{{ asset('frontend/images/logo.png') }}"
                    class="user-image img-circle elevation-2" alt="User Image">
                <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                <!-- User image -->
                <li class="user-header bg-primary">
                    <img src="{{ asset('frontend/images/logo.png') }}"
                        class="img-circle elevation-3"
                        alt="User Image">
                    <p>
                        {{ Auth::user()->name }}
                        <small>Member since {{ Auth::user()->created_at->format('M. Y') }}</small>
                    </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                    <a href="{{route('profile.edit')}}" class="btn btn-primary">Profile</a>
                    <a href="#" class="btn btn-danger float-right"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Sign out
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</nav>

        @include('layouts.partials.sidebar')
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-5 text-right">
                            @yield('content-actions')
                        </div>
                    </div>
                </div>
            </section>


            <section class="content">
                @include('sweetalert::alert')
                @yield('content')
            </section>

        </div>


        @include('layouts.partials.footer')

    </div>

    <script src="{{ asset('js/app.js') }}"></script>

    <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="{{ asset('core/jquery.min.js')}}"></script>
    <script src="{{ asset('core/popper.min.js')}}"></script>
    <script src="{{ asset('core/bootstrap.min.js')}}"></script>
    <script src="{{ asset('plugins/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{ asset('js/plugins/bootstrap-notify.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('plugins/chartjs.min.js')}}"></script>
    <script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('plugins/chart.js/Chart.js')}}"></script>
    <script src="{{asset('assets/demo.js')}}"></script>
    <!-- daterangepicker -->
    <script src="{{asset('plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('dist/js/adminlte.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.23.0/slimselect.min.js"></script>
    @yield('js')
</body>



</html>
