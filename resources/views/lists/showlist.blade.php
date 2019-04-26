@extends('layout')

@section('title', "Lista {$usermovie->id}")

@section('content')
     <h1>Lista #{{ $usermovie->id }}</h1>

	Nombre de la lista: {{ $usermovie->nombre}}	
	
	<a href="{{ url("/listas/{$usermovie->id}/addmovie") }}">Agregar pelicula</a>

	 <ul>
	 
	 Peliculas que tiene:
        @forelse ($pelis as $movie)
             <li>{{$movie->id}}{{ $movie->titulo }})
			 </li>
		@empty
        
			<li>No hay pelis registradas.</li>
        @endforelse
    </ul>

@endsection