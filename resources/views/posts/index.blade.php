@extends('layouts.app')

@section('content')

<div class="container">

    @if(count($posts)>0)
    @foreach($posts as $post)
    <div class="card mb-3">
        <img class="card-img-top" src="/storage/cover_images/{{$post->cover_image}}" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{$post->title}}</h5>
            <p class="card-text">{{$post->body}}</p>
            <p class="card-text"><small class="text-muted">Subido el: {{$post->created_at}} por <a href="/users/{{$post->user->id}}">{{$post->user->name}}</a></small></p>
        </div>
    </div>
    @endforeach
    @else
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">No images yet.</h5>
        </div>
    </div>
    <br>
    @endif

</div>

@endsection