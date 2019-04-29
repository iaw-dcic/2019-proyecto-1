@extends('layout')

@section('title', "Perfil {$user->id}")

@section('content')
     <h3>Perfil del usuario: #{{$user->name}}
	 
	 @if(Auth::id()==$user->id)
	<small>
	<a href="{{ route('users.edit', $user) }}">Editar</a>

	

	<form action="{{ route('users.delete', $user)}}" method="POST">
			{{ csrf_field() }}
			{{ method_field('DELETE') }}
			<button type="submit" onclick="return confirm('Está seguro que quiere eliminar su cuenta?');" >Eliminar</button>
	</form>
		
	</small>
	
	
	@endif
	
	</h3>
	
    <p>Correo electrónico: {{ $user->email }}</p>	
	
    <p>Listas: </p>
	  @forelse ($pelis as $usermovie)
	  
             <li>{{$usermovie->id}}- {{ $usermovie->nombre }}
			 <a href="{{ route('lists.show', $usermovie->id) }}">Ver</a>
			 </li>
		@empty
        
			<li>No hay usuarios registrados.</li>
        @endforelse
	
	
@endsection
