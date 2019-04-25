<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MovieLists</title>

        @section('js_extra')
        @endsection
        @section('css_extra')
        <link rel="stylesheet" href="{{asset('css/pages/welcome.css')}}">
        @endsection
        @include('includes.head')


    </head>
    <body class="material-dark">
        <div class="flex-center position-ref ">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="container ">
                <div class="title m-b-md content">
                  MovieLists
                </div>
                <div class="card material-light">
                  <div class="card-header material-dark">
                      @auth
                        Listas
                      @else
                        Listas publicas
                      @endauth
                  </div>

                  <div class="card-body material-regular">
                    <i class="fas fa-film" style="font-size:4rem;"></i>
                  </div>
                </div>

            </div>
        </div>

    </body>
</html>
