@extends('layout')

@section('title', 'Usuarios')

@section('content')
    <h1>{{ $title }}</h1>

    <ul>
        @forelse ($users as $user)
             <li>{{$user->id}}{{ $user->name }}, ({{ $user->email }})
			 <a href="{{ url("/usuarios/{$user->id}") }}">Ver detalles</a>
			 </li>
        
		@empty
        
			<li>No hay usuarios registrados.</li>
        @endforelse
    </ul>
@endsection
