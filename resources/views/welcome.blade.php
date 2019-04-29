<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Project1WEB-AgustinGarcia</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link href="css/style.css" rel="stylesheet" type="text/css">

    </head>
    <body>
        <div class="flex-center position-ref full-height">
                <div class="top-center links">
                @if (Route::has('login'))
                    @auth
                        <a href="/users/{{{ Auth::user()->id }}}">Profile</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                    
                    @endif
                    <a class="nav-link" href="/readme">Readme</a>
                    <a class="nav-link" href="/users">Explore</a>
                </div>
            

            <div class="content">
                <div class="title m-b-md">
                Project1WEB-AgustinGarcia
                </div>

                <div class="links">
                    
                </div>
            </div>
        </div>
    </body>
</html>
