@extends('mainTemplate')

@section('content')
	<h1>Seccion de listas</h1>

	@foreach ($elements as $element)
	<ul class = "list-group">
		<li class = "list-group-item active">canción: {{ $element -> name }}</li>
		<li class = "list-group-item">album: {{ $element -> album }}</li>
		<li class = "list-group-item">banda: {{ $element -> band }}</li>
	<ul class = "list-group">
	@endforeach

@endsection