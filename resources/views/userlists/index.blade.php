@extends('layouts.app')

@section('stylesheets')
	<link rel="stylesheet" href="{{ asset('css/wrappers.css') }}">
	<link rel="stylesheet" href="{{ asset('css/posts.css') }}">
@endsection

@section('body')
	<h1>{{$user->username}}'s lists</h1>

	@if(Auth::check() && Auth::user()->id == $user->id)
		<div class="link">
			<a href="/{{Auth::user()->username}}/myLists/create">Create new list</a>
		</div>
	@endif
	<ul>
		@foreach ($user->lists as $list)
			@if((Auth::check() && Auth::user()->id == $user->id) || $list->public)
				@component('components.listview', compact('user', 'list')))
				@endcomponent
			@endif
		@endforeach
	</ul>
@endsection
