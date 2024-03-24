<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Telsip</title>
    <link rel="icon" href="{{ asset('img/logo.jpeg') }}">
    {{-- UI SOFT --}}
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('img/telsip/telsip.png')}}">
    <link href="{{asset('css/nucleo-icons.css')}}../assets/" rel="stylesheet" />
    <link href="{{asset('css/nucleo-svg.css')}}" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{asset('css/nucleo-svg.css')}}" rel="stylesheet" />
    <link id="pagestyle" href="{{asset('css/soft-ui-dashboard.css?v=1.0.7')}}" rel="stylesheet" />
    

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
    <link id="pagestyle" href="{{asset('css/soft-ui-dashboard.css?v=1.0.7')}}" rel="stylesheet" />
    <link href="{{asset('css/nucleo-icons.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/custom.css')}}">

    {{-- UI SOFT --}}
    
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
    <script>
        // INSERT JS HERE
        // SOCIAL PANEL JS
        const floating_btn = document.querySelector('.floating-btn');
        const close_btn = document.querySelector('.close-btn');
        const social_panel_container = document.querySelector('.social-panel-container');

        floating_btn.addEventListener('click', () => {
            social_panel_container.classList.toggle('visible')
        });

        close_btn.addEventListener('click', () => {
            social_panel_container.classList.remove('visible')
        });
    </script>
</body>
</html>