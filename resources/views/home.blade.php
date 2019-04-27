@extends('layout')

@section('title', 'Lista actuales de peliculas')

@section('content')

 <h1>{{ $title }}</h1>

  <ul>
    
    </ul>
 
 <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Lista</th>
      <th scope="col">Creada por</th>
    </tr>
  </thead>
  <tbody>
  
      @forelse ($listas as $usermovie)
              	
    <tr>
      <th scope="row">{{$usermovie->id}})</th>
      <td>  <a href="{{ url("/listas/{$usermovie->id}") }}"> {{$usermovie->nombre}}</a>  </td>
      <td > <a href="{{ url("/usuarios/{$usermovie->creador_id}") }}">{{ $usermovie->creador_id }} </a></td>
    </tr>
  
	
	   @empty
            <li>No hay listas disponibles.</li>
        @endforelse
  </tbody>
</table>
@endsection
