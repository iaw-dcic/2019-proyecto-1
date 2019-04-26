@extends('secondTemplate')

@section('content')
	
	<h1 class="text-center font-weight-light mt-1 my-3">{{$list->title}}</h1>
		
	<ul class="list-group-flush w-25" style="padding-bottom: 50px; padding-top: 50px">
		<li class="list-group-item"><a href="{{$list->id}}/edit">edit</a></li>
		<li class="list-group-item"><a href="{{$list->id}}/create">add song</a></li>
	</ul>
		@if (count($list->songs)>0)
		<ul class="list-group">
			
			@foreach ($list->songs as $song)
				<li class="list-group-item"><a href="/songs/{{$song->id}}">{{ $song->title }} ({{ $song->band }})</a></li>
			@endforeach

		</ul>
		@else
			<div class="container mt-5">
				<p class="h5 text-center font-weight-light mt-1 my-3" style="color: darkgrey;">No songs in this list</p>
			</div>
		@endif

@endsection