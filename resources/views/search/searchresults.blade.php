@extends('layouts.app')

@section('title')
	Búsqueda de Usuarios
@endsection

@section('content')
	<h2 class="text-center">{{ __('Ingrese el usuario a buscar') }}</h2>
	
	<div class="text-center">
	<form method="POST" action="/search">
		@csrf
		<div class="text-center">
            <input id="name" type="name" class="form-control" name="name" required autofocus>
        </div>
        <br/>
        <button type="submit" class="btn btn-primary">
            {{ __('Buscar') }}
        </button>
	</form>
	</div>

	<br/>

	@if($users->isEmpty())
		<h3 class="text-center">{{ __('No se han encontrado usuarios') }}</h3>
	@else
		<div class="text-center">
		@foreach($users as $user)
			<a href="/searchresults/{{$user->id}}"><li class="list-group-item"> {{ $user->name }} </li></a>
		@endforeach
		</div>
	@endif
@endsection