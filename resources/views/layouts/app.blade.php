<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>MovieLists</title>
      <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('includes.head')
  </head>
  <body class="material-primary">
    <nav class="navbar navbar-expand-md navbar-light material-dark">
        <div class="container ">
          <a class="navbar-brand" href="{{ url('/') }}">
            MovieLists
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
          </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <!-- Left Side Of Navbar -->
              <ul class="navbar-nav mr-auto">

              </ul>

              <!-- Right Side Of Navbar -->
              <ul class="navbar-nav ml-auto">
                  <!-- Authentication Links -->
                  @guest
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                      </li>
                      @if (Route::has('register'))
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                          </li>
                      @endif
                  @else
                    <li class="nav-item">
                      <a class="nav-link" title="Log Out" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          {{ Auth::user()->name }} <i class="fas fa-sign-out-alt"></i>
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                    </li>
                  @endguest
              </ul>
            </div>
        </div>
    </nav>
    <main class="container">
              @yield('content')
    </main>

    <footer>

    </footer>
  </body>
</html>
