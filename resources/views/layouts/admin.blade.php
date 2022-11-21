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
        {{-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake img-circle elevation-2" src="{{asset('frontend/images/logo.png')}}" alt="Logo" height="200" width="200">
        </div> --}}
        @include('layouts.partials.navbar')
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






