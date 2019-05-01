<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <script type="text/javascript" src="{{ asset('jquery-ui/jquery-1.12.4.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('jquery-ui/jquery-ui.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('jquery/jquery-3.4.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('jquery/jquery.validate.min.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('datepicker/bootstrap-datepicker.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('js/others.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('datatables/datatables.min.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('datatables/DataTables-1.10.18/js/jquery.dataTables.min.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('datatables/DataTables-1.10.18/js/dataTables.bootstrap4.min.js') }}" defer></script>

    <!-- Fonts -->
    <link type="text/css" href="{{ asset('css/all.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link type="text/css" href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('css/texts.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('datepicker/bootstrap-datepicker.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('css/principal.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <link type="text/css" href="{{ asset('jquery-ui/jquery-ui.css') }}" rel="stylesheet">
    @if(Route::current()->getName() == "login" || Route::current()->getName() == "register" || Route::current()->getName() == "password.request" || Route::current()->getName() == "dashboard")
        <link type="text/css" href="{{ asset('css/login-register.css') }}" rel="stylesheet">
    @endif
    <script type="text/javascript" src="{{ asset('js/profile.js') }}" defer></script>
    <link type="text/css" href="{{ asset('css/profile.css') }}" rel="stylesheet">
    
</head>
<body>
    <div id="app">
        @if(Route::current()->getName() == "dashboard" || Route::current()->getName() == "home" || Route::current()->getName() == "profiles" || Route::current()->getName() == "profile" || Route::current()->getName() == "about")
            <nav class="navbar navbar-expand-md navbar-dark bg-dark justify-content-between">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-nav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="navbar-collapse collapse dual-nav w-50 order-0 order-md-0">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a id="appName" class="navbar-brand" href="{{ url('/') }}">
                                    {{ config('app.name', 'OverList') }}
                                </a>
                            </li>
                        </ul>
                        <ul></ul>
                    </div>

                    <div class="navbar-collapse collapse dual-nav w-50 order-1">
                        <input id="search" name="name" class="typeahead form-control mx-auto d-block" type="search" placeholder="Search" aria-label="Search" autocomplete="off">
                    </div>

                    <div class="navbar-collapse collapse dual-nav w-50 order-2">
                        <ul></ul>
                        <ul class="nav navbar-nav ml-auto">
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('about') }}">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                     
                                    @if(auth()->user()->avatar)
                                        @if(Route::current()->getName() == "profile")
                                        <img class='avatarUser' src="../../{{ auth()->user()->avatar }}" alt="avatar" width="22" height="22">
                                        @elseif(Route::current()->getName() == "home")
                                        <img class='avatarUser' src="../{{ auth()->user()->avatar }}" alt="avatar" width="22" height="22">
                                        @endif
                                    @endif
                                    {{ auth()->user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('home') }}">
                                        My profile
                                    </a>
                                    <a class="dropdown-item" href="{{ url('about') }}">
                                        About
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        @endif
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
