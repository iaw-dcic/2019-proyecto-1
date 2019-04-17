@extends('mainTemplate')

@section('content')
	
	<h1 style="text-align: center">{{$list->title}}</h1>
		
	<ul class="list-group-flush w-25" style="padding-bottom: 50px; padding-top: 50px">
		<li class="list-group-item"><a href="{{$list->id}}/edit">editar</a></li>
		<li class="list-group-item"><a href="{{$list->id}}/create">agregar canción</a></li>
	</ul>
	
	<ul class="list-group">
		
		@foreach ($list->songs as $song)
			<li class="list-group-item"><a href="/songs/{{$song->id}}">{{ $song->title }} ({{ $song->band }})</a></li>
		@endforeach

	</ul>

@endsection