@extends('layout')

@section('stylesheets')
<link rel="stylesheet" href="{{ asset('css/card.css') }}" >
@endsection


@section('content')
<h3> Resultados de perfiles de usuario </h3>
		<div class="card">
		@foreach ($users as $user)
			<div class="card-body">
				<a href="/usuarios/{{$user->id}}"> {{$user->name}}</a>
			</div>
		@endforeach
		</div>
@endsection