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
			<form method="POST" action="/{{$user->id}}/myLists/{{$list->id}}/items/{{ $item->id }}">
				@method('DELETE')
				@csrf
				{{ $item->description }}
				<button type="submit"> Delete </button>
			</form>
		@endforeach
		</ul>
		<br>
	@endif

	<form method="POST" action="/{{$user->id}}/myLists/{{ $list->id }}/items">
		@csrf
		<input type="text" name='description' placeholder="new item"><br>
		<button type="submit">add item</button>
	</form>

	@include('errors')

@endsection
