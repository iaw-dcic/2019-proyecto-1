@extends('layouts.app')

@section('body')
	<h1>{{$user->username}}'s lists</h1>
	<ul>
		@foreach ($user->lists as $list)
			@if(Auth::check() && Auth::user()->id == $user->id)
				<form method="POST" action="/{{Auth::user()->username}}/myLists/{{ $list->id }}">
					@method('DELETE')
					@csrf
					<a href="/{{Auth::user()->username}}/myLists/{{ $list->id }}">{{$list->list_name}}</a>
					<button type="submit"> Delete </button>
				</form>
			@else
				@if($list->public)
					<li>{{$list->list_name}}</li>
				@endif
			@endif
		@endforeach
	</ul>
	@if(Auth::check() && Auth::user()->id == $user->id)
		<a href="/{{Auth::user()->username}}/myLists/create">Create new list</a>
	@endif
@endsection
