@extends('layouts.app')

@section('stylesheets')
	<link rel="stylesheet" href="{{ asset('css/wrappers.css') }}">
	<link rel="stylesheet" href="{{ asset('css/fadeIn.css') }}">
@endsection

@section('body')
	<nav class="navbar navbar-default fadeInDown navbar-fixed-top" >
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="{{ url('/') }}">
					{{ config('app.name', 'ListMaker') }}
				</a>
			</div>

			<!-- Right Side Of Navbar -->
			<ul class="nav navbar-nav navbar-right ml-auto">
				<li>
					<form method="POST" action="/search" class="navbar-form" role="search">
						@csrf
						<div class="input-group">
							<input type="text" aria-label="search text input" class="form-control" placeholder="Search lists" name="search">
							<div class="input-group-btn">
								<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
							</div>
						</div>
					</form>
				</li>
				<!-- Authentication Links -->
				@guest
					<li class="nav-item">
						<a class="nav-link" href="{{ route('login') }}"><span class="glyphicon glyphicon-log-in"></span> {{ __('Login') }}</a>
					</li>
					@if (Route::has('register'))
						<li class="nav-item">
							<a class="nav-link" href="{{ route('register') }}"><span class="glyphicon glyphicon-user"></span> {{ __('Register') }}</a>
						</li>
					@endif
					@else
					<li class="nav-item">
						<a class="nav-link" href="/{{ Auth::user()->username }}/myLists">Manage lists</a>
					</li>
					<li class="nav-item dropdown">
						<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
							{{ Auth::user()->username }} <span class="caret"></span>
						</a>

						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="/profile/{{ Auth::user()->username }}">
								User Profile
							</a>
							<br>
							<a class="dropdown-item" href="{{ route('logout') }}"
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
	</nav>
	<div id="content" class="homepagebody fadeInUp">
		@yield('content')
	</div>
@endsection
