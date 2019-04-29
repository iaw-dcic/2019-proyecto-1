@extends('layouts.app')

@section('title')
 	{{$movie->name}}
@endsection

@section('content')
	<div class="text-center">
		<h2>{{$movie->name}}</h2>
	</div>

	<div class="text-center">
		<div class="text-center">
			<ul class="list-inline">
				<li class="lead">Nombre de la película: </li> <li>{{$movie->name}}</li>
			</ul>
			<ul class="list-inline">
				<li class="lead">Género: </li> <li>{{$movie->genre}}</li>
			</ul>
			<ul class="list-inline">
				<li class="lead">Año de lanzamiento: </li> <li>{{$movie->year}}</li>
			</ul>
			<ul class="list-inline">
				<li class="lead">Sinopsis: </li> <li>{{$movie->description}}</li>
			</ul>
		</div>
	</div>

	<br/>
	<div class="text-center">
	<a href="/searchresults/{{$user->id}}/list/{{$list->id}}">	
		<button type="button" class="btn btn-secondary">Volver</button>
	</a>
	</div>

@endsection