@extends('layouts.app')

@section('body')
	<h1>{{$user->username}}'s profile</h1>
	<div><img src="/public/{{$user->image}}"/></div>
@endsection
