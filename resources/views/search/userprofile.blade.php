@extends('layouts.app')

@section('title')
	Perfil de {{$user->name}}
@endsection

@section('content')
	<h2 class="text-center">{{ $user->name }}</h2>
	
	<div class="text-center">
		Acá irían los datos
	</div>

	<div class="text-center">

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