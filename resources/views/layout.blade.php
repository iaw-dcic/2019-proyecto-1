<!DOCTYPE html>
<html long="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width-device-width, user-scalable=no, initial-scale=1.0, maxium-scale=1.0, minimum-scale=1.0">
        <meta  http-equiv="X-UA-Compatible" content="ie-edge">
        <title>Styre</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link href="{{asset('css/navbarstyle.css')}}" rel="stylesheet">
        <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="{{asset('css/searchstyle.css')}}" rel="stylesheet">
</head>
<body>
  <div id="wrapper" class="animate">
    <nav class="navbar header-top fixed-top navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="{{asset('/')}}">Styre</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav animate side-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{asset('/search')}}" title="Search"><i class="fas fa-search"></i> Buscar lista <i class="fas fa-search shortmenu animate"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" title="New List"><i class="fas fa-list"></i> Crear lista <i class="fas fa-list shortmenu animate"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" title="My lists"><i class="fas fa-database"></i> Mis listas <i class="fas fa-database shortmenu animate"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{asset('/register')}}" title="Registrarme"><i class="fas fa-id-card"></i> Registrarme <i class="fas fa-id-card shortmenu animate"></i></a>
          </li>
        </ul>
        <ul class="navbar-nav ml-md-auto d-md-flex">
          <li class="nav-item">
            <a class="nav-link" href="{{asset('/login')}}"><i class="fas fa-user"></i> Mi perfil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{asset('/')}}"><i class="fas fa-key"></i> Cerrar sesión</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
<main role="main" class="container-fluid">
    @yield('content')
</main>

</body>
</html>