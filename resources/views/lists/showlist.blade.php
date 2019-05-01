@extends('layout')

@section('title', "Lista {$usermovie->id}")
 
@section('stylesheets')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" >
@endsection

@section('content')

<div id="main">
	<h1> <b>{{ $usermovie->nombre }}</b><small class="text-muted"> creada por <a href="{{ route('users.show',  ['user'=> $user->id]) }}"><i>{{$user->name}}</i></a> </small> </h1>
	
	@if ( Auth::id()==$usermovie->creador_id)
	<form action="{{ route('lists.delete', ['usermovie'=> $usermovie->id])}}" method="POST">
			{{ csrf_field() }}
			{{ method_field('DELETE') }}			
	 <button type="submit" class="btn btn-link" onclick="return confirm('Desea eliminar esta lista?');">Eliminar</button>
	
	  <a href="{{ route('lists.edit',  ['usermovie'=> $usermovie->id]) }}">Editar</a>
	 
	<center>
	  <a href="{{ url("/listas/{$usermovie->id}/addmovie") }}"  class="btn icon-btn btn-success">+ Pelicula</a>
	</center>
	
	
	</form>
	@endif 

</div>

  <ul>
    
    </ul>
	
	<div id="table-wrapper">
	<div id="table-scroll">
	<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col"></th>
      <th scope="col">Nombre</th>
      <th scope="col">Director</th>
	  <th scope="col">Año</th>
	  <th scope="col"></th>
	  <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
     @forelse ($pelis as $movie)
    <tr>
      <th scope="row"></th>
      <td> <a>{{ $movie->titulo }}</a> </td>
      <td><a>{{ $movie->director }}</a></td>
	  <td><a>{{ $movie->año }}</a></td>
	  @if ( Auth::id()==$usermovie->creador_id)
	  <td>
		<form action="{{ route('movies.delete', ['usermovie'=> $usermovie->id, 
												'movie'=> $movie->id])}}" method="POST">
			{{ csrf_field() }}
			{{ method_field('DELETE') }}
			
			<button type="submit"  class="btn btn-danger" onclick="return confirm('Desea eliminar esta pelicula?');">Eliminar</button>
		</form>
	  </td>
	   <td>
	  	<a class="btn btn-info" href="{{ route('movies.edit',  ['usermovie'=> $usermovie->id, 
												'movie'=> $movie->id]) }}">Editar</a>
		</td>
		@endif 
		
    </tr>
  </tbody>
  
  @empty
        
		
  
  @endforelse
</table>
</div>
</div>

@endsection