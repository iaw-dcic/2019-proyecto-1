@extends('secondTemplate')

@section('content')
	
	<h1 style="text-align: center">{{$list->title}}</h1>
	
	@if (count($songs)>0)
		<ul class="list-group">
			
			@foreach ($songs as $song)
				<li class="list-group-item"><a href="/songs/{{$song->id}}">{{ $song->title }} ({{ $song->band }})</a></li>
			@endforeach

		</ul>
	@else
		<div class="container" style="text-align: center; padding-top: 50px;">
			<p class="h5" style="color: darkgrey;">This list is empty</p>
		</div>
	@endif

@endsection