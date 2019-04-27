<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Styre</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link href="{{asset('css/navbarstyle.css')}}" rel="stylesheet">
        <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link href="{{asset('css/searchstyle.css')}}" rel="stylesheet">
        @yield('content')
</head>
<body style="overflow-y:hidden; overflow-x:hidden">
  <div id="wrapper" class="animate">
    <nav class="navbar header-top fixed-top navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="{{asset('/')}}">Styre</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav animate side-nav">
          @if (Auth::check())
          <li class="nav-item">
            <a class="nav-link" href="#" title="Nueva lista"><i class="fas fa-list"></i> Crear lista <i class="fas fa-list shortmenu animate"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" title="Mis listas"><i class="fas fa-database"></i> Mis listas <i class="fas fa-database shortmenu animate"></i></a>
          </li>
          @endif
          <li class="nav-item">
            <a class="nav-link" href="" title="Búsqueda"><i class="fas fa-search"></i> Búsqueda <i class="fas fa-search shortmenu animate"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('users.index')}}" title="Usuarios"><i class="fas fa-users"></i> Usuarios<i class="fas fa-users shortmenu animate"></i></a>
          </li>
        </ul>
        <ul class="navbar-nav ml-md-auto d-md-flex">
        @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login')}}" title="Iniciar sesión"><i class="fas fa-user"></i> Iniciar sesión</a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{route('register')}}" title="Registrarme"><i class="fas fa-id-card"></i> Registrarme</a>
            </li>
            @endif
        @else
            <li class="nav-item">
                <label class="nav-link" title="Username"> Bienvenido/a {{Auth::user()->name}} ! </label>
            </li>
            <li>
                <a class="nav-link" href="#" title="Editar perfil"><i class="fas fa-user"></i>Editar perfil</a>
            </li>
            <li>
                <a class="nav-link" href="{{route('logout')}}" title="Salir"
                    onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="fas fa-power-off"></i>Cerrar sesión
                </a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endguest
        </ul>
      </div>
    </nav>
  </div>
<main role="main" class="container-fluid">
    @yield('content')
</main>

</body>
</html>