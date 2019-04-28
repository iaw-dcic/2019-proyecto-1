@extends('layouts.app')

@section('title')
	Listas de {{ auth()->user()->name }}
@endsection

@section('content')

	@if ($lists->isEmpty())
		<h4 class="text-center">¡No tienes ninguna lista!</h4>
	@endif

	<div class="text-center">

	@foreach($lists as $list)
		<li class="list-group-item"><p class="lead">{{ $list->name }}</p></li> 

		<div class="btn-group">
			<a href="/lists/{{$list->id}}">
				<button type="button" class="btn btn-success">Ver</button>
			</a>
			<a href="/lists/{{$list->id}}/edit">
				<button type="button" class="btn btn-success">Editar</button>
			</a>
			<form method="POST" action="/lists/{{$list->id}}">
				@csrf
				@method('DELETE')
				<button type="submit" class="btn btn-danger">Eliminar</button>
			</form>
		</div>
	@endforeach
	</div>

	<br/>

	<div class="text-center">
		<a href="/lists/create">
			<button type="button" class="btn btn-primary">
        		<h4>{{ __('Añadir nueva lista') }}</h4>
    		</button>
    	</a>
	</div>

@endsection