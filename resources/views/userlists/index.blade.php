@extends('layout')

@section('body')
    <title>Lists</title>
    <h1>My Lists</h1>
	<ul>
		@foreach ($lists as $list)
			<li>
				<a href="{{ $list->id }}">{{$list->list_name}}</a>
			</li>
		@endforeach
	</ul>
	<a href="/myLists/create">Create new list</a>
@endsection
