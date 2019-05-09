<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



    @if((Route::current()->getName()=='home')||(Route::current()->getName()=='users.showListas') ||(Route::current()->getName()=='users.show'))
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    {{-- <link rel="stylesheet" href="/resources/demos/style.css"> --}}
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
    $( function() {
      $( "#accordion" ).accordion();
    } );
    </script>
    @endif


</head>
<body>
    <div id="app">

            <nav class="navbar navbar-expand-md navbar-dark bg-dark stycky-top">
                    {{-- collapse --}}
                    <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
                            <span class="navbar-toggler-icon"></span>
                     </button>



                    <div class="collapse navbar-collapse" id="collapse_target">

                            <a class="navbar-brand" href="{{ route('home') }}"><img src="futbol.png" alt="home"></a>
                            <span class="navbar-text">Futboleros</span>
                            </a>

                        <ul class="navbar-nav">
                            {{-- <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" data-target="dropdown_target" href="#">Dropdown</a>
                                <span class="caret"></span>
                                <div class="dropdown-menu" aria-labelledby="drowdown_target"> --}}
                                    {{-- enlaces dentro de nuestro menu desplegable --}}
                                    {{-- <a class="dropdown-item" href="">Nombre de usuario</a>
                                </div>
                            </li> --}}
                        <ul class="navbar-nav">
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
                                <a class="nav-link dropdown-toggle" href="#" data-target="dropdown_target"  data-toggle="dropdown">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdown_target">
                                    {{-- enlaces dentro de nuestro menu desplegable --}}
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </li>
                        @endguest
                       </ul>




                            @if(auth()->user()!=null)
                            <li class="nav-item">
                                <a class="nav-link"  data-ajax="false" href="{{ route('users.create') }}">Crear Lista</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"  data-ajax="false" href="{{ route('users.showListas') }}">Mis Listas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-ajax="false"href="{{ route('users.edit',auth()->user()) }}">Configuración</a>
                            </li>
                            @endif
                        </ul>
                    </div>
            </nav>



        <br>
        <br>

        <div class="container">
            <div>
                @yield('content')
            </div>
        </div>
    </div>

</body>
</html>
