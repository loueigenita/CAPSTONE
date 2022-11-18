<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @yield('css')
</head>

<body class="hold-transition login-page">
    <div class="login-box">
   
        <!-- /.login-logo -->
        <div class="container mt-5 col-md-5 ">
            <div class="row">
                <div class="card bg-dark">
                        @yield('content')
                    </div>
            </div>
        </div>
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('js/app.js') }}"></script>

    @yield('js')

</body>

</html>
