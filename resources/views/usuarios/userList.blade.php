@extends('secondTemplate')

@section('content')
	
	<h1 class="text-center font-weight-light mt-1 my-3">{{$list->title}}</h1>
	
	@if (count($songs)>0)
		<ul class="list-group">
			
			@foreach ($songs as $song)
				<li class="list-group-item"><a href="/search/{{$user->id}}/{{$list->id}}/{{$song->id}}">{{ $song->title }} ({{ $song->band }})</a></li>
			@endforeach

		</ul>
	@else
		<div class="container pt-5">
			<p class="h5 darkgrey text-center">This list is empty</p>
		</div>
	@endif

@endsection