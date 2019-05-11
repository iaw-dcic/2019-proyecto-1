@extends('layouts.app')

@section('content')
{{-- 
    
    <div class="container">
        
        @if(count($posts)>0)
        @foreach($posts as $post)
        <div class="card mb-3">
            <img class="card-img-top" src="/storage/cover_images/{{$post->cover_image}}" alt="Card image cap">
<div class="card-body">
    <h5 class="card-title"><a href="/users/{{$post->user->id}}">{{$post->user->name}}</a></h5>
    <p class="card-text">{{$post->body}}</p>
    <p class="card-text"><small class="text-muted">Uploaded on: {{$post->created_at}}</small></p>
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
--}}


<div class="container">

    <div class="card mb-3">
        <div class="card-body bg-dark text-center light-font">
            <h5>Profile.</h5>
        </div>
        <div class="card-body text-center">
            <h5>Nombre: {{ $user->name }}</h5>
            <h5>Edad: {{ $user->edad }} </h5>
            <h5>Mail: {{ $user->email }} </h5>
            <h5>Profesión: {{ $user->profesion }} </h5>
        </div>
    </div>

    <br>
    <hr>
    <br>
    <div class="card mb-3">
        <div class="card-body bg-dark text-center light-font">
            <h5>Imágenes.</h5>
        </div>
    </div>

    @if(count($posts)>0)
    @foreach($posts as $post)
    <div class="card mb-3">
        <img class="card-img-top" src="/storage/cover_images/{{$post->cover_image}}" alt="Card image cap">
        <div class="card-body">

            <div class="row">
                <div class="col">
                    <h4 class="card-title">{{$post->title}}</h4>
                    <p class="card-text">{{$post->body}}</p>
                    <p class="card-text"><small class="text-muted">Subido el: {{$post->created_at}}</small></p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @else
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">Sin imágenes.</h5>
        </div>
    </div>
    <br>
    @endif

</div>
@endsection