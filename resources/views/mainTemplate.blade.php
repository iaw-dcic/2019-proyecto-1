<!DOCTYPE html>
<html>
<head>
	<link href="/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<nav class="navbar navbar-expand-md navbar-light sticky-top" style="background-color: #e3f2fd;">
		<div class="container">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                	@yield('leftside')

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">

	                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
					    	<form class="form-inline ml-auto" method="GET" action="/search">
					      		<div class="md-form my-0">
				        		<input class="form-control mr-sm-2" type="text" name="user" placeholder="Search..." aria-label="Search">
					    	  	</div>
					    	</form>
					 	 </div>

                        <li class="nav-item">
                            <a class="nav-link" href="/about">Readme</a>
                        </li>
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
	                            <li class="nav-item dropdown">
	                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
	                                    {{ Auth::user()->name }} <span class="caret"></span>
	                                </a>
	                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                		<a class="dropdown-item" href="/profile">
                                        	My profile
                                    	</a>
                                    	<a class="dropdown-item" href="/edit_profile">
                                        	Edit profile
                                    	</a>
	                                    <a class="dropdown-item border-top border-dark" href="{{ route('logout') }}"
	                                       onclick="event.preventDefault();
	                                                     document.getElementById('logout-form').submit();">
	                                        {{ __('Logout') }}
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

	<div>
		@yield('content')
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>