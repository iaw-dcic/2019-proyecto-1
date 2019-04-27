@extends('layouts.app')

@section('body')
	<form method="POST" action="/{{$user->username}}/myLists/{{$list->id}}/items/{{$item->id}}">
		@method('PATCH')
		@csrf
		<input type="text" name="name" value="{{$item->name}}" placeholder="item name">
		<select class="form-control" name="priority">
			<option>Low</option>
			<option>Medium</option>
			<option>High</option>
		</select>
		<input type="text" name="description" value="{{$item->description}}" placeholder="item description">
		<button type="submit">Apply</button>
	</form>
@endsection
