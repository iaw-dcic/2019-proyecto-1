@extends('layouts.master')

@section('title')
Perfil de {{$user->name}}
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <p class='titulo titulo-h3'>Perfil de {{$user->name}}</p>
        </div>
        <div class="col-md-2">
                <a class="btn btn-light btn-md" href="{{route('playlists',['user'=>$user->id])}}">Playlists</a>
        </div>
        @auth
        @if($user->id == auth()->user()->id)
        <div class="col-md-2">
                <a class="btn btn-primary btn-md" href="{{route('settings')}}">Editar perfil</a>
        </div>
        @endif
        @endauth
    </div>
    <div class="row">
        <p>Nombre - {{$user->name}}</p><br>
        <p>Email - {{$user->email}}</p><br>
    </div>
</div>
@endsection
