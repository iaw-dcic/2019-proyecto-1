<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ComicColect</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> 
        <link href='https://fonts.googleapis.com/css?family=Bangers' rel='stylesheet'>
        <link rel="stylesheet" href="{{ asset('css/miestilo.css') }}">

    </head>
    <body>

    <nav class="navbar navbar-inverse">
      <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand titulo" href="/">ComicColect</a>
        </div>
<!--
        <form class="navbar-form navbar-left" action="/action_page.php">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Buscar" name="search">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <i class="glyphicon glyphicon-search"></i>
                            </button>
                        </div>
                    </div>
        </form>
-->
        <div class="nav navbar-nav navbar-right">
            @if (Route::has('login'))
                <div class="top-right links">
                  <ul class="nav navbar-nav navbar-right">
                    @auth
                        <li><a href="{{ url('/home') }}">Home</a></li>
                    @else
                        <li><a href="{{ route('login') }}"><span class="glyphicon glyphicon-log-in" ></span> Iniciar Sesión </a></li>

                        @if (Route::has('register'))
                            <li><a href="{{ route('register') }}"><span class="glyphicon glyphicon-user"></span> Registrarse </a></li>
                        @endif
                    @endauth
                </div>
            @endif
      </div>
    </nav>
            <div class="content container">
            <div class="text-center titulo tituloBlanco well"><h2>Colecciones Públicas</h2></div><br>
                   <div class="flex-container">
                     @foreach ($colecciones as $colecion)
                        <div class="gallery">
                            <a href="/{{$colecion->id}}/showItems" target="_self" class="linkCard">
                                <img src="#" alt="{{ $colecion->name }}" width="400" height="250">
                            
                            <div class="desc">
                                <h6 class="tituloCard">{{ $colecion->name }}</h6>
                                <p class="colorP">{{ $colecion->description }}</p></div>
                        </div>
                        </a>
                       @endforeach 
                     
                   </div>
               
                </div>
            </div>
        </div>
    </body>
</html>
