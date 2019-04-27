@extends('layouts.app')

@section('stylesheets')
	<link rel="stylesheet" href="{{ asset('css/slider.css') }}">
@endsection

@section('body')
    <h1>Edit list</h1>
    <form method="POST" action="/{{$user->username}}/myLists/{{ $list->id }}">
    	@method('PATCH')
    	@csrf

		<input type="text" name="list_name" placeholder="list name" value= '{{ $list->list_name }}'>
		<!-- Rounded switch -->
		<label>Public</label>
		<label class="switch">
			<input name="public" type="checkbox" {{$list->public ? 'checked' : ''}}>
			<span class="slider round"></span>
		</label>

    	<button type="submit">Save changes</button>
    </form>

	<form method="POST" action="/{{$user->username}}/myLists/{{ $list->id }}">
    	@method('DELETE')
    	@csrf

    	<button type="submit" style="background-color: red">Delete list</button>
	</form>
	<script src="{{ asset('js/createList.js') }}" defer></script>
@endsection
