@extends('secondTemplate')

@section('content')
	<div class = "container w-25 pt-2">
		<ul class="list-group">
			<li class="list-group-item active">Título: {{$song->title}}</li>
			<li class="list-group-item">Album: {{ $song->album }}</li>
			<li class="list-group-item">Band: {{ $song->band }}</li>
		</ul>
	</div>
@endsection