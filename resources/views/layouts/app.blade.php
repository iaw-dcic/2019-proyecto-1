<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('jquery/jquery.min.js') }}"></script>
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('datepicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('js/others.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/texts.css') }}" rel="stylesheet">
    <link href="{{ asset('datepicker/bootstrap-datepicker.css') }}" rel="stylesheet">
    @guest
        <link href="{{ asset('css/login-register.css') }}" rel="stylesheet">
    @endguest
</head>
<body>
    <div id="app">
        @guest
        @else
            <nav class="navbar navbar-expand-md navbar-dark bg-dark">
                <div class="container">
                    <a id="appName" class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'OverList') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
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
                                    @if(auth()->user()->avatar && auth()->user()->provider_id)
                                        <img id='avatarUser' src="{{ auth()->user()->avatar }}" alt="avatar" width="32" height="32">
                                    @elseif(auth()->user()->avatar && !(auth()->user()->provider_id))
                                        <img id='avatarUser' src="../{{ auth()->user()->avatar }}" alt="avatar" width="32" height="32">
                                    @endif
                                    {{ auth()->user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
        @endguest
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
