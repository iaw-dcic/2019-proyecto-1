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
			<a href="/lists/{{$list->id}}/movies/{{$movie->id}}/editmovie">
				<button type="button" class="btn btn-success">Editar</button>
			</a>
			<form method="POST" action="/lists/{{$list->id}}/movies/{{$movie->id}}">
				@csrf
				@method('DELETE')
				<button type="submit" class="btn btn-danger">Eliminar</button>
			</form>
		</div>

	@endforeach
	</div>

	<br/>

	<div class="text-center">
		<a href="/lists/{{$list->id}}/createmovie">
			<button type="button" class="btn btn-primary">
        		<h4>{{ __('Añadir nueva película') }}</h4>
    		</button>
    	</a>
	</div>

	<br/>

	<div class="text-center">
		<a href="/lists">
			<button type="button" class="btn btn-secondary">
        		<h6>{{ __('Volver') }}</h6>
    		</button>
    	</a>
	</div>
@endsection