@extends('mainTemplate')

@section('content')
	
	<h1>{{$song->title}}</h1>

	<p class="h5">Album: {{ $song->album }}</p>
	<p class="h5">Band: {{ $song->band }}</p>

@endsection