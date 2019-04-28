@extends('layouts.app')

@section('title')
 	{{$movie->name}}
@endsection

@section('content')
	<div class="text-center">
		<h2>{{$movie->name}}</h2>
	</div>
	<div class="form-group row">
    	<label for="name" class="col-md-4 col-form-label text-md-right">Nombre de la película: {{$movie->name}}</label>
	</div>

	<div class="form-group row">
    	<label for="Género" class="col-md-4 col-form-label text-md-right">Género: {{$movie->genre}}</label>
	</div>

	<div class="form-group row">
		<label for="year" class="col-md-4 col-form-label text-md-right">Año de lanzamiento: {{$movie->year}}</label>
	</div>

	<div class="form-group row">
    	<label for="description" class="col-md-4 col-form-label text-md-right">Sinopsis: {{$movie->description}}</label>
	</div>
@endsection