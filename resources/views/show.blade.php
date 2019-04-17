@extends('mainTemplate')

@section('content')
	
	<h1>{{$list->title}}</h1>
	<a href="{{$list->id}}/edit">editar</a>

	<ul class="list-group">
		
		@foreach ($list->songs as $song)
			<li class="list-group-item"><a href="/songs/{{$song->id}}">{{ $song->title }} ({{ $song->band }})</a></li>
		@endforeach

	</ul>

@endsection