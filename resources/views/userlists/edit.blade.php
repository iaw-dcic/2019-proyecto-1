@extends('layouts.app')

@section('body')
    <h1>Edit project</h1>
    <form method="POST" action="/{{$user->id}}/myLists/{{ $list->id }}">
    	@method('PATCH')
    	@csrf

    	<input type="text" name="list_name" placeholder="list name" value= '{{ $list->list_name }}' ><br>
    	<button type="submit">Save changes</button>
    </form>

	<form method="POST" action="/{{$user->id}}/myLists/{{ $list->id }}">
    	@method('DELETE')
    	@csrf

    	<button type="submit" style="background-color: red">Delete list</button>
    </form>
@endsection
