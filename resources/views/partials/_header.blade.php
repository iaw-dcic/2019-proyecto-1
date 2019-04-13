<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Header section -->
<header class="header-section">
    <div class="header-warp">
        <div class="header-bar-warp d-flex">
            <!-- site logo -->
            <a href="home.html" class="site-logo">
                <img src="./img/logo.png" alt="">
            </a>

            <nav class="top-nav-area w-100">
                <div class="user-panel">
                @guest
                    <a href="./login">Ingresar</a> / 
                    <a href="./register">Registrarse</a> 
                @endguest
                @auth
                    <a href="./logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                Salir
                            </a> /
                    <a href="./register">Registrarse</a> 
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endauth
                </div>

                <!-- Menu -->
                <ul class="main-menu primary-menu">
                    <li><a href="./">Inicio</a></li>
                    <li><a href="./games">Juegos</a>
                        <ul class="sub-menu">
                            <li><a href="game-single.html">Game Singel</a></li>
                        </ul>
                    </li>
                    <li><a href="./about">Nosotros</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>
<!-- Header section end -->