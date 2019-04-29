@extends('layouts.app')

@section('title')
	{{$list->name}}
@endsection

@section('content')
	<h2 class="text-center">{{$list->name}}</h2>

	@if ($movies->isEmpty())
		<h4 class="text-center">¡No hay ninguna película en esta lista!</h4>
	@endif

	<div class="text-center">
	@foreach($movies as $movie)
		<li class="list-group-item">{{ $movie->name }}</li> 

		<div class="btn-group">
			<a href="/searchresults/{{$user->id}}/list/{{$list->id}}/movie/{{$movie->id}}">
				<button type="button" class="btn btn-success">Ver Datos</button>
			</a>
		</div>

	@endforeach
	</div>

	<a href="/searchresults/{{$user->id}}">	
		<button type="button" class="btn btn-secondary">Volver</button>
	</a>
@endsection