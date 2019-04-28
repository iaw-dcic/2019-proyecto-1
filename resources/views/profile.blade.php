@extends('layouts.app')

@section('content')
<div class="container">
    @guest
     HOLA, ESTE ES EL PERFIL DE : {{$user->name}}

    @else   
    <div class="jumbotron">
        <h1 class="display-5">Hello, {{$user->name}}</h1>
        <p class="lead">e-mail: {{$user->email}}</p>
        <p class="lead">nick: {{$user->nick}}</p>
        <hr class="my-5">
        <p>Puede editar su perfil haciendo click en el siguiente enlace</p>
        <a class="btn btn-outline-dark btn-lg" href="#" role="button" onclick="location.href='/profile/{{$user->id}}/edit';">
            {{ __('Edit profile') }}
        </a>
    </div>

    <hr />
    @endguest
</div>
@endsection