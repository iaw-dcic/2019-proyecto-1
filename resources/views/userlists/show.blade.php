@extends('layout')

@section('body')
	<h1>{{ $list->list_name }}</h1><br>

	<a href="/myLists/{{ $list->id }}/edit">Edit</a><br>

	@if($list->items->count())
		<ul>
		@foreach ($list->items as $item)
			<form method="POST" action="/items/{{ $item->id }}">
				@method('DELETE')
				@csrf
				{{ $item->description }}
				<button type="submit"> Delete </button>
			</form>
		@endforeach
		</ul>
		<br>
	@endif

	<form method="POST" action="/myLists/{{ $list->id }}/items">
		@csrf
		<input type="text" name='description' placeholder="new item"><br>
		<button type="submit">add item</button>
	</form>

	@include('errors')

@endsection
