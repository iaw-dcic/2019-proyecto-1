@extends('layout')

@section('title', 'Usuarios')

@section('stylesheets')
<link rel="stylesheet" href="{{ asset('css/card.css') }}" >
@endsection

@section('content')
    <h1>{{ $title }}</h1>

<div class="containerm">
 
	<p>
		
        @forelse ($users as $user)
		  	<div class="card">
			<div class="card-body">
             <li>{{ $user->name }}, ({{ $user->email }})
			 <a href="{{ url("/usuarios/{$user->id}") }}">Ver perfil</a>
			 </li>
        </div>
		 </div>
		@empty
        
			<li>No hay usuarios registrados.</li>
        @endforelse
	</p>
   
</div>
@endsection
