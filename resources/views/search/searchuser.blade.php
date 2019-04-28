@extends('layouts.app')

@section('title')
	Búsqueda de Usuarios
@endsection

@section('content')
	<h2 class="text-center">{{ __('Ingrese el usuario a buscar') }}</h2>
	
	<div class="text-center">
	<form method="POST" action="/search">
		@csrf
		<div class="col-md-6">
            <input id="name" type="name" class="form-control" name="name" required autofocus>
        </div>
        <button type="submit" class="btn btn-primary">
            {{ __('Buscar') }}
        </button>
	</form>
	</div>
@endsection