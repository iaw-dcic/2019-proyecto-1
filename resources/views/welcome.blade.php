<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Catalogo de Juegos</title>

      
        <link href="{{ asset('css/homeStyle.css') }}" rel="stylesheet">
        <link href= "{{asset('css/reason1Color.css')}}" rel="stylesheet">
          <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

       
    </head>
    <body>
        <div class="position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="loginBot">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="registerBot">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Bienvenido a la libreria de Juegos!
                </div>
                <div class="reason reason1">
                    <h3> Tus catalogos en todo momento </h3>
                    <p> crea tus listas para juegos acorde a tus necesidades y 
                        accedelas desde donde quieras en todo momento</p>                
                </div>
                <div class="reason reason2">
                    <h3>Listas que se adaptan a tus necesidades</h3>
                    <p>Accede a tus listas con tan solo acceder a tu sesión 
                    y modificalas a tu gusto, siempre puedes agregar o quitar juegos de una lista
                    y el sistema relflejará los cambios en tiempo real</p>
                </div>
                <div class="reason reason3">
                    <h3>Una sociedad de listas</h3>
                    <p>Comparte tus listas con tan solo presionar un botón 
                    y deja que el mundo sepa sobre juegos que tal vez nunca hayan escuchado hablar</p>
                </div>
            </div>
        </div>
    </body>
</html>