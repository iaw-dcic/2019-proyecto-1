<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Inicio</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

       <link href="{{ asset('css/stylecss.css') }}" rel="stylesheet">
       <link href="{{ asset('css/estilo.css') }}" rel="stylesheet">
    </head>
   <body class='fondo'>
        <div class="flex-center position-ref full-height"> 
         
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Mi Cuenta</a>
                    @else
                        <a href="{{ route('login') }}">Ingresar</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Registrarse</a>
                        @endif
                    @endauth
                </div>
            @endif
                <div class='titulo'> 
            <!-- <div class="conten<!-- <!--  --> 
                <!-- <div class="title m-b-md"> -->
                 <div class='titulo'>   
                   <h1> Store de Autos </h1>

                </div>

                <div class="links">
                    <a href="{{ url('/Persona') }}">About</a> 
                    <a href="{{ url('/ListasPublicas') }}">Coleccion</a>
                    
                </div>
            </div>
        </div>
    </body>
</html>
