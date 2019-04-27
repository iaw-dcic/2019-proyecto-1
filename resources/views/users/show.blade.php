@extends('layout')

@section('title', "Perfil {$user->id}")

@section('content')
     <h3>Perfil del usuario: #{{$user->name}}
	 
	 @if(Auth::id()==$user->id)
	<small>
	<a href="{{ route('users.edit', $user) }}">Editar</a>
	<a href="{{ route('users.delete', $user) }}">Eliminar</a>
	</small>
	@endif
	
	</h3>
	
    <p>Correo electrónico: {{ $user->email }}</p>	
	
    <p>Listas: </p>
	  @forelse ($pelis as $usermovie)
             <li>{{$usermovie->id}}- {{ $usermovie->nombre }}
			 </li>
        
		@empty
        
			<li>No hay usuarios registrados.</li>
        @endforelse
	
	
@endsection
