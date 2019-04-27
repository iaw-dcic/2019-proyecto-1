@extends('layouts.app')

@section('stylesheets')
	<link rel="stylesheet" href="{{ asset('css/wrappers.css') }}">
	<link rel="stylesheet" href="{{ asset('css/posts.css') }}">
@endsection

@section('body')
	<div id="homepagebody">

		<nav class="navbar navbar-default fadeInDown navbar-fixed-top" >
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="{{ url('/') }}">
						{{ config('app.name', 'ListMaker') }}
					</a>
				</div>
				<ul class="nav navbar-nav">
					<li class="nav-item active" id="top-voted">
						<a>Top voted</a>
					</li>
					<li class="nav-item" id="most-viewed">
						<a>Most viewed</a>
					</li>
					<li class="nav-item" id="new-lists">
						<a>New lists</a>
					</li>
				</ul>

				<!-- Right Side Of Navbar -->
				<ul class="nav navbar-nav navbar-right ml-auto">
					<li>
						<form class="navbar-form" role="search">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Search" name="q">
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

		<main id="content" class="py-4">
		</main>
	</div>
	<script src="{{ asset('js/home.js') }}" defer></script>
@endsection
