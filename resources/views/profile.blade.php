@extends('layouts.app')

@section('body')
	<h1>{{$user->username}}'s profile</h1>
	<div><img src="/public/{{$user->image}}"/></div>
	<br>
	<a href="/{{$user->username}}/myLists">See {{$user->username}}'s lists</a>
@endsection
