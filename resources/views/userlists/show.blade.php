@extends('layouts.app')

@section('body')
	<h1>{{ $list->list_name }}</h1>
	<label>
	@if($list->public)
		(public)
	@else
		(private)
	@endif
	</label>
	<br>

	<a href="/{{$user->username}}/myLists/{{ $list->id }}/edit">Edit</a><br>

	@if($list->items->count())
		<ul>
		@foreach ($list->items as $item)
			<li>
				<form method="POST" action="/{{$user->username}}/myLists/{{$list->id}}/items/{{ $item->id }}">
					@method('DELETE')
					@csrf
					<div class="priority priority-{{$item->priority}}"></div>
					<span  class="item-name" data-toggle="tooltip" data-placement="right" title="{{$item->description}}">
						{{$item->name}}
					</span>
					<a href="/{{$user->username}}/myLists/{{$list->id}}/items/{{$item->id}}/edit">Edit</a>
					<button type="submit"> Delete </button>
				</form>
			</li>
		@endforeach
		</ul>
		<br>
	@endif

	<form method="POST" action="/{{$user->id}}/myLists/{{ $list->id }}/items">
		@csrf
		<input type="text" name='name' placeholder="name">
		<select class="form-control" name="priority">
			<option>Low</option>
			<option>Medium</option>
			<option>High</option>
		</select>
		<input type="text" name='description' placeholder="description">
		<br>
		<button type="submit">add item</button>
	</form>

	@include('errors')

@endsection
