@extends('secondTemplate')

@section('content')
	
	@if (count($usuarios) > 0)
		<ul class="list-group">
			
			@foreach ($usuarios as $usuario)
				<li class="list-group-item"><a href="search/{{$usuario->id}}">{{ $usuario->name }} ({{ $usuario->email }})</a></li>
			@endforeach

		</ul>
	@else
		<div class="container mt-5">
			<p class="h5 text-center font-weight-light mt-1 my-3 darkgrey">No users found</p>
		</div>
	@endif

@endsection