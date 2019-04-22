@extends('layouts.app')

@section('body')
	<?php
		$topVotedSelected = false;
		$mostViewedSelected = false;
		$newListsSelected = false;
	?>
	<div id="app">
		<nav class="navbar navbar-default fadeInDown">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="{{ url('/') }}">
						{{ config('app.name', 'ListMaker') }}
					</a>
				</div>

				<ul class="nav navbar-nav">
					@yield('selectedTab')
					<li class="{{ $topVotedSelected ? 'active' : '' }}">
						<a href="/topVoted">Top voted</a>
					</li>
					<li class="{{ $mostViewedSelected ? 'active' : '' }}">
						<a href="/mostViewed">Most viewed</a>
					</li>
					<li class="{{ $newListsSelected ? 'active' : '' }}">
						<a href="/newLists">New lists</a>
					</li>
				</ul>

				<!-- Right Side Of Navbar -->
				<ul class="nav navbar-nav navbar-right ml-auto">
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
						<li class="nav-item dropdown">
							<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
								{{ Auth::user()->username }} <span class="caret"></span>
							</a>

							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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

		<main class="py-4">
			@yield('content')
		</main>
	</div>
@endsection
