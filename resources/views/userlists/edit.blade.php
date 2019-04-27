@extends('layouts.app')

@section('body')
    <h1>Edit list</h1>
    <form method="POST" action="/{{$user->username}}/myLists/{{ $list->id }}">
    	@method('PATCH')
    	@csrf

		<input type="text" name="list_name" placeholder="list name" value= '{{ $list->list_name }}'>

    	<button type="submit">Save changes</button>
    </form>

	<form method="POST" action="/{{$user->username}}/myLists/{{ $list->id }}">
    	@method('DELETE')
    	@csrf

    	<button type="submit" style="background-color: red">Delete list</button>
	</form>
	<script src="{{ asset('js/createList.js') }}" defer></script>
@endsection
