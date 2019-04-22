@extends('layout')

@section('title', "Perfil {$user->id}")

@section('content')
     <h1>Perfil del usuario #{{$user->id}}</h1>

    <p>Nombre del usuario: {{ $user->name }}</p>
    <p>Correo electrónico: {{ $user->email }}</p>
	
   
@endsection