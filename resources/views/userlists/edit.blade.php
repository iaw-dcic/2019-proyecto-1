@extends('layout')

@section('body')
    <h1>Edit project</h1>
    <form method="POST" action="/myLists/{{ $list->id }}">
    	@method('delete')
    	@csrf

    	<input type="text" name="list_name" placeholder="list name" value= '{{ $list->list_name }}' ><br>
    	<button type="submit">Save changes</button>
    </form>

    <form method="POST" action="/myLists/{{ $list->id }}">
    	@method('DELETE')
    	@csrf

    	<button type="submit" style="background-color: red">Delete list</button>
    </form>
@endsection