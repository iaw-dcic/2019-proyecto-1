@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{$album->name}}</h1>
    <br>
    <p>Artista : {{$album->bandName}}</p>
    <p>Link : {{$album->link}}</p>
    <br>

    <a href="{{ route('showUser',['id' => $album->user_id]) }}" class="btn btn-primary">Atras</a>

</div>


@endsection
