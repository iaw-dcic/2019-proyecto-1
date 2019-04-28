@extends('layouts.app')

@section('title')
	Perfil de {{$user->name}}
@endsection

@section('content')
	<h2 class="text-center">{{ $user->name }}</h2>
	
	<div class="text-center">
		Acá irían las listas y los datos
	</div>
@endsection