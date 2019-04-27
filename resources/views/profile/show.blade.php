@extends('layouts.app')

@section('stylesheets')
	<link rel="stylesheet" href="{{asset('css/profile.css')}}">
@endsection

@section('body')
	<div class="container">
		<div class="row">
			<div class="profile-header-container">
				<div class="profile-header-img">
					<img class="img-circle" src="{{asset($user->image)}}" />
					<!-- badge -->
					<div class="rank-label-container">
						<span class="label label-default rank-label">{{$user->username}}</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	@if($user->nickname != "")
		<h2>{{$user->nickname}}</h2><br>
	@endif
	@if($user->bio != "")
		<h3>{{$user->bio}}</h3>
	@endif
	@if(Auth::check() && Auth::user()->id == $user->id)
		<a href="/profile/{{$user->username}}/edit">Edit profile</a><br>
		<a href="/{{$user->username}}/myLists">See my lists</a>
	@else
		<a href="/{{$user->username}}/myLists">See {{$user->username}}'s lists</a>
	@endif
@endsection
