@extends('secondTemplate')

@section('content')
	
	<ul class="list-group">
		
		@foreach ($usuarios as $usuario)
			<li class="list-group-item"><a href="search/{{$usuario->id}}">{{ $usuario->name }} ({{ $usuario->email }})</a></li>
		@endforeach

	</ul>

@endsection