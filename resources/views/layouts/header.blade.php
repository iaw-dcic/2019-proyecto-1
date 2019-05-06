<header>
    <nav class="navbar navbar-expand-md navbar-dark bg-secondary fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'miplaylist') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/home') }}">Home</a>
                    </li>
                </ul>



                <div class="dropdown-divider"></div>


                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto nav-flex-icons">
                    <!-- Authentication Links -->
                    @guest
                        <!-- no esta logeado: -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else



                        <!-- esta logeado: -->
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{--si quiero un icono:--}}
                                <i class="fas fa-user"></i>
                                {{--si quiero nombre:
                                    {{ Auth::user()->name }}
                                --}}
                                <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item" href="{{route('profile',['user'=>auth()->user()->id])}}">Perfil</a>

                                <a class="dropdown-item" href="{{route('create_playlist',['user'=>auth()->user()->id])}}">Nueva playlist</a>

                                <a class="dropdown-item" href="{{route('settings')}}">Configuracion</a>

                                {{--divisor de menu--}}
                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}
                                </a>

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
</header>

