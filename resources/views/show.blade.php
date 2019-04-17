@extends('mainTemplate')

@section('content')

	<h1>{{$list->title}}</h1>
	<a href="{{$list->id}}/edit">editar</a>

	<div>
		
		@foreach ($list->songs as $song)
			<li>{{ $song->title }}</li>
		@endforeach

	</div>

@endsection