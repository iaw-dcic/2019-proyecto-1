@extends('layouts.app')

@section('title')
	Perfil de {{$user->name}}
@endsection

@section('content')
	<h2 class="text-center">{{ $user->name }}</h2>
	
	<div class="text-center">
		<div class="text-center">
			<ul class="list-inline">
				<li class="lead">Nombre: </li> <li>{{$user->name}}</li>
			</ul>
			<ul class="list-inline">
				<li class="lead">Género: </li> 
				<li>@if($user->gender==null)
						{{'No especificado'}}
					@else
						{{$user->gender}}
					@endif
				</li>
			</ul>
			<ul class="list-inline">
				<li class="lead">Acerca de {{$user->name}}: </li> 
				<li>@if($user->about==null)
						{{'No especificado'}}
					@else
						{{$user->gender}}
					@endif
				</li>
			</ul>
		</div>
	</div>

	<div class="text-center">

	<h2 class="text-center">Listas de {{ $user->name }}</h2>

	@foreach($lists as $list)
		<li class="list-group-item"><p class="lead">{{ $list->name }}</p></li> 

		<div class="btn-group">
			<a href="/searchresults/{{$user->id}}/list/{{$list->id}}">
				<button type="button" class="btn btn-success">Ver</button>
			</a>
		</div>
	@endforeach
	</div>
@endsection