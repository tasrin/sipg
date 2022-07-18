<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'SIPG') }} - Sistem Informasi Pendataan dan Penggajian Karyawan</title>
    <link rel="icon" href="{{ asset('img/logo.jpeg') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />
    @yield('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.0.0-alpha/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.8/css/skins/skin-red-light.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/regular.css" integrity="sha384-z3ccjLyn+akM2DtvRQCXJwvT5bGZsspS4uptQKNXNg778nyzvdMqiGcqHVGiAUyY" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/fontawesome.css" integrity="sha384-u5J7JghGz0qUrmEsWzBQkfvc8nK3fUT7DCaQzNQ+q4oEXhGSx+P2OqjWsfIRB8QT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="hold-transition @guest login-page login-bg @else skin-blue sidebar-mini @endguest">
    <div id="load">Loading..</div>
    <div class="wrapper">
        @guest
            @include('layouts.navbar')
        @endguest
        @auth
            @include('layouts.header')

            @include('layouts.sidebar')
        @endauth

        @yield('content')

        @auth
            @include('layouts.footer')
        @endauth
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.0.0-alpha.2/dist/js/adminlte.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.min.js"></script>
    <script src="{{ asset('js/jquery.inputmask.bundle.min.js') }}"></script>
    <link href="{{ asset('src/css/mk-notifications.css')}}" rel="stylesheet">
    <script src="{{ asset('src/js/mk-notifications.js')}}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    @yield('scripts')
    @include('alert.mk-notif')
    <script>
         $('#link').click(function(){
            window.location = $(this).data('href');
            return false;
        });
    </script>
</body>
</html>