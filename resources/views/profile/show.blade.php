@extends('layouts.app')

@section('body')
	<div><img src="/public/{{$user->image}}"/></div>
	<h1>{{$user->username}}'s profile</h1><br>
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
