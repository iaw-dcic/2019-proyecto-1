@extends('layout')

@section('title', 'Lista actuales de peliculas')

@section('stylesheets')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" >
@endsection

@section('content')

 <h1>{{ $title }}</h1>

 
  <ul>
    
    </ul>
 
  <div id="table-wrapper">
  <div id="table-scroll">
 <table class="table">
    <thead class="thead-light">
    <tr>   
	  <th scope="col"></th>
      <th scope="col">Lista</th>
      <th scope="col">Creada por</th>
    </tr>
  </thead>
  <tbody>
   @forelse ($listas as $usermovie)
    @if($usermovie->public==true)  		
    <tr>
		  <td> </td>  
   <p>   <td>  <a href="{{ url("/listas/{$usermovie->id}") }}"> {{$usermovie->nombre}}</a>  </td><p>
	  @foreach($users as $user)
		  @if($usermovie->creador_id==$user->id)
	<p>	  <td > <a href="{{ url("/usuarios/{$usermovie->creador_id}") }}"> {{ $user->name }} </a></td> </p>
		  @endif
	
	  @endforeach
	  @endif
    </tr>
	@empty
       <li>No hay listas disponibles.</li>
          	@endforelse
		
  </tbody>
    </div>
</div>
  


</table>
@endsection
