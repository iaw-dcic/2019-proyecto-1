<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Regna Bootstrap Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicons -->
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="{{ asset('lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
    Theme Name: Regna
    Theme URL: https://bootstrapmade.com/regna-bootstrap-onepage-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>

    <!--==========================
  Header
  ============================-->
    <header id="header">
        <div class="row">
            <div id="logo" class="pull-left col-xs-2 col-md-2">
                <a href="{{ url('/') }}"><img src="img/logo.png" alt="" title="" /></img></a>
                <!-- Uncomment below if you prefer to use a text logo -->
                <!--<h1><a href="#hero">Regna</a></h1>-->
            </div>

            <div class="col-xs-8 col-md-4">
                <nav class="navbar-inline">

                    <form class="form-inline" role="search" action="{{url('home/searchredirect')}}">
                        <div class="form-group ml-sm-4 mr-sm-2">
                            <input type="text" class="form-control w-100" name='search' placeholder="Buscar ..." />
                        </div>

                    </form>
                </nav>
            </div>

            <div class="col-xs-2 col-md-4">
                <nav id="nav-menu-container">
                    <ul class="nav-menu mr-auto">
                        @guest
                        <li>
                            <a href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li>
                            <a href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                        </li>
                        @endif
                        @else
                        <li>
                            <a href="{{ route('create-list') }}">{{ __('Crear Lista') }}</a>
                        </li>
                        <li>
                            <a href="#">{{ __('Mis Listas') }}</a>
                        </li>
                        <li class="menu-has-children"><a href="#">
                            <img class="rounded-circle mr-1" width="20px" height="20px" src="{{ asset('uploads/avatars/'.Auth::user()->avatar) }}">  {{ Auth::user()->username }} </a>
                            <ul>
                                <li>
                                <a href="{{ route('user.profile') }}">{{ __('Perfil') }}</a>
                                </li>
                                <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endguest
                    </ul>
                </nav><!-- #nav-menu-container -->
            </div>


        </div>
    </header><!-- #header -->

    @yield('sectioncontent')

    <main class="py-4">
        @yield('content')
    </main>

    <script src="{{ asset('/lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/lib/jquery/jquery-migrate.min.js') }}"></script>
    <script src="{{ asset('/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('/lib/superfish/hoverIntent.js') }}"></script>
    <script src="{{ asset('/lib/superfish/superfish.min.js') }}"></script>

    <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>