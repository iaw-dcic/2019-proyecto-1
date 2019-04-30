@extends('layouts.homelink')

@section('stylesheets')
	<link rel="stylesheet" href="{{asset('css/profile.css')}}">
@endsection

@section('content')
	<div class="wrapper">
		<div id="formContent">
			<div class="row">
				<div class="profile-header-container">
					<div class="profile-header-img">
						<img alt="profile picture" class="img-circle" src="{{asset('storage/images/'.$user->image)}}" />
						<!-- badge -->
						<div class="rank-label-container">
							<span class="label label-default rank-label">{{$user->username}}</span>
						</div>
					</div>
				</div>
			</div>
			<div id="user-info">
				@if($user->nickname != "")
					<h3>{{$user->nickname}}</h3>
				@endif
				@if($user->bio != "")
					<h4>{{$user->bio}}</h4>
				@endif
			</div>
			<div id="links">
				@if(Auth::check() && Auth::user()->id == $user->id)
					<a href="/profile/{{$user->username}}/edit">Edit profile</a><br>
					<a href="/{{$user->username}}/myLists">See my lists</a>
				@else
					<a href="/{{$user->username}}/myLists">See {{$user->username}}'s lists</a>
				@endif
			</div>
		</div>
	</div>
@endsection
