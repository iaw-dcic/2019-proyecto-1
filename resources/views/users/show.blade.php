@extends('layout')

@section('stylesheets')
<link rel="stylesheet" href="{{ asset('css/card.css') }}" >
@endsection

@section('title', "Perfil de usuario: {$user->name}")

@section('content')
   
	  <h1>Perfil de <i><b>{{$user->name}} </i></b>
	
	 @if(Auth::id()==$user->id)
		<form action="{{ route('users.delete', $user)}}" method="POST">
				{{ csrf_field() }}
				{{ method_field('DELETE') }}
		<button type="submit" class="btn btn-link" onclick="return confirm('Está seguro que quiere eliminar su cuenta?');" >Eliminar</button>
		
	<!--	<a href="{{ route('users.edit', $user) }}">Editar</a> -->
		
	
		</form>
	@endif
	</h1>

    <p>Correo electrónico: {{ $user->email }}</p>	
	
	 <h3> Listas </h3>
	 
	
		<div class="containerm">
		<div class="card">
		<p>
				@guest
				<div class="card-body">
					 
						  @forelse ($pelis as $usermovie)
							@if($usermovie->public==true)
								 <li> <a href="{{ route('lists.show', $usermovie->id) }}">{{ $usermovie->nombre }}</a></li>
							@endif
							@empty
							
								<li>No hay listas registrados.</li>
							@endforelse
					</div>
				@else
					<div class="card-body">
					
				  @forelse ($pelis as $usermovie)
				  
						 <li> <a href="{{ route('lists.show', $usermovie->id) }}">{{ $usermovie->nombre }} - </a>
						@if ($usermovie->public==1)
								<i>publica	</i>
						@endif
						@if ($usermovie->public==0)
								<i>privada	</i>
						@endif
						</li>
					@empty
					
						<li>No hay listas registradas.</li>
					@endforelse
						</div>
				@endguest
		   
		</p>
		</div>	
		</div>	
	
@endsection
