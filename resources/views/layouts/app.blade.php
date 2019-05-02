<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Haiku') }}</title>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link src="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{security_asset('css/app.css')}}" rel="stylesheet">
    <link href="{{security_asset('css/appaux.css')}}" rel="stylesheet">
    <link href="{{security_asset('css/dataTables.css')}}" rel="stylesheet">




</head>
<body>

    <div  class="content">
        <nav class="navbar  fixed-top navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Haiku') }}
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
                        <li class="nav-item">
                                <a class="nav-link" href="{{ route('about') }}">about</a>
                            </li>
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
                                    {{ Auth::user()->name }} <span class="caret"></span>
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
                                    <a class="dropdown-item" href="{{ route('profile') }}">
                                        Profile
                                    </a>
                                    </div>
                                    
                                
                            </li>
                        @endguest
                    </ul>
                </div>
            
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</div>


<!-- Footer -->
<footer class="footer">
    
  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2019 :
    <a href="https://cs.uns.edu.ar">UNS IAW</a>
  </div>
  <!-- Copyright -->


</footer>
<!-- Footer -->
<script src="{{security_asset('js/app.js')}}" ></script>
<script src="{{security_asset('js/jquery.js')}}"></script>
<script src="{{security_asset('js/dataTables.js')}}"></script>
<script src="{{security_asset('js/dataTables.bootstrap4.js')}}" ></script>
<script src="{{security_asset('js/avatar.js')}}"></script>
<script src="{{security_asset('js/parallax.js')}}"></script>





<script>
    
    $(document).ready(function() {
    $('#albums').DataTable();
} );
</script>




    
</body>
</html>
