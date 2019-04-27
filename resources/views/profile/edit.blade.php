@extends('layouts.app')

@section('stylesheets')
	<link rel="stylesheet" href="{{asset('css/login.css')}}">
@endsection

@section('body')
	<h1>{{$user->username}}</h1>
	<form method="POST" action="/profile/{{$user->username}}">
		@method('PATCH')
		@csrf
		<input type="text" name="nickname" value="{{$user->nickname}}" placeholder="nickname">
		<input type="text" name="bio" value="{{$user->bio}}" placeholder="bio">
		<input type="submit" value="Save changes">
	</form>
@endsection
