@extends('mainTemplate')

@section('content')
	<h1>Seccion de listas</h1>

	<ul class = "list-group">


	@foreach ($listas as $lista)

		<li class = "list-group-item"><a href="/lists/{{$lista->id}}">{{ $lista -> title }}</a></li>
	
	@endforeach

	<ul class = "list-group">

@endsection