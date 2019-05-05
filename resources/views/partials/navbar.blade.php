<!--
    Botones para cuando no está iniciada la sesión:
        Explorar - Iniciar sesión - Registrarse

    Botones para cuando se inició sesión
        Inicio - Subir foto - Foto de perfil (y submenú)
-->

@include('partials.profile.crear-post')

<nav class="row navbar navbar-expand-lg no-gutters">
    <div class="col-1 mr-1 mr-lg-2">
        <a class="navbar-brand titulo" href="{{ route('welcome') }}"><i class="fas fa-camera-retro"></i> <span> Protolog </span></a>
    </div>

    <div class="d-flex justify-content-end">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-search" aria-controls="navbar-search" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars menu"></i>
        </button>
    </div>

    <div class="collapse navbar-collapse" id="navbar-search">
        <div class="col ml-1 ml-lg-5">
            <!--Formulario de búsqueda-->
            <form class="form-inline my-2 my-lg-0" id="form-search" method="GET" action="/user/search">
                <div class="searchbar d-flex align-items-center" id="div_search">
                    <input class="typeahead search_input" id="search_input" type="text" name="username" placeholder="Buscar usuario...">
                    <button type="submit" href="#" class="search_icon d-flex justify-content-center align-items-center"
                        id="search_btn" onmouseover="document.getElementById('search_input').focus()">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
        </div>

        <div class="col-7">
            <ul class="navbar-nav d-flex justify-content-end align-items-start align-items-lg-center">
                @guest
                    <li class="nav-item borde-inferior">
                        <a href="#actividad-publica" class="nav-link" id="explorar">Explorar</a>
                    </li>
                    <li class="nav-item borde-inferior">
                        <a href="{{ route('login') }}" class="nav-link" id="iniciar-sesion">Ingresar</a>
                    </li>
                    <li class="nav-item bg-verde">
                        <a href="{{ route('register') }}" class="nav-link" id="registrarse">Registrarse</a>
                    </li>
                @else
                    <li class="nav-item borde-inferior">
                        <a href="{{ route('home') }}" class="nav-link" id="inicio">Inicio</a>
                    </li>

                    <li class="nav-item bg-verde">
                        <a href="#" data-toggle="modal" data-target="#crearPost" class="nav-link" id="subir-foto">Subir foto</a>
                    </li>

                    <li class="nav-item dropdown img-perfil">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{ url('/storage/users/' . Auth::user()->photo) }}" id="foto_perfil_navbar"></img>
                            &#64;{{ Auth::user()->username }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu fade" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item efecto-corchete" href="{{ route('profile') }}">Perfil</a>
                            <a class="dropdown-item efecto-corchete" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar sesión</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest

            </ul>
        </div>
    </div>
</nav>
