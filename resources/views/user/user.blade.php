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
        <div class="col-md-4">
            <a class="btn btn-light btn-md" href="{{route('playlists',['user'=>$user->id])}}">Playlists</a>
            @auth
            @if($user->id == auth()->user()->id)
            <a class="btn btn-secondary btn-sm" href="{{route('settings')}}">Editar perfil</a>
            @endif
            @endauth
        </div>

    </div>
    <div class="row">
        <div class="col-md-8">
            @auth
            @if($user->id == auth()->user()->id)
            <p class="lead">{{$user->email}}</p><br>
            @endif
            @endauth
            <p class="lead">{{$user->nombre}}</p><br>
            <p class="lead">{{$user->about}}</p><br>
        </div>
    </div>
</div>
@endsection
