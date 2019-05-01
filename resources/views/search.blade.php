@extends('layout')

@section('stylesheets')
<link rel="stylesheet" href="{{ asset('css/card.css') }}" >
@endsection


@section('content')
<h3> Resultados de perfiles de usuario </h3>
<div class="containerm">
		<div class="card">
		<p>
		@forelse ($users as $user)
			<div class="card-body">
				<a href="/usuarios/{{$user->id}}"> {{$user->name}}</a>
			</div>
					
		@empty
			 <li>No se encontraron resultados</li>
		@endforelse
		</p>
		</div>
</div>
@endsection