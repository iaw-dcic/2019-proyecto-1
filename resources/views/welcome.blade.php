<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cataloo de Juegos</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }



            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .reason1 > h3 {
                font-family: 'Quicksand', sans-serif;
                font-weight: 200;
                
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
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

            <div class="content">
                <div class="title m-b-md">
                    Bienvenido a la libreria de Juegos!
                </div>

                <div class="reason1">
                    <h3> Tus catalogos en todo momento </h3>
                    <p> crea tus listas para juegos acorde a tus necesidades y 
                        accedelas desde donde quieras en todo momento</p>                
                </div>

                <div class="reason2">
                    <h3>Listas que se adaptan a tus necesidades</h3>
                    <p>Accede a tus listas con tan solo acceder a tu sesión 
                    y modificalas a tu gusto, siempre puedes agregar o quitar juegos de una lista
                    y el sistema relflejará los cambios en tiempo real</p>
                </div>

                <div class="reason3">
                    <h3>Una sociedad de listas</h3>
                    <p>Comparte tus listas con tan solo presionar un botón 
                    y deja que el mundo sepa sobre juegos que tal vez nunca hayan escuchado hablar</p>
                </div>
            </div>
        </div>
    </body>
</html>
