@extends('secondTemplate')

@section('content')
	<div class = "container w-25" style="padding-top: 20px;">
		<ul class="list-group">
			<li class="list-group-item active">Título: {{$song->title}}</li>
			<li class="list-group-item">Album: {{ $song->album }}</li>
			<li class="list-group-item">Band: {{ $song->band }}</li>
		</ul>
		<a href="/songs/{{$song->id}}/edit">edit</a>
	</div>
@endsection