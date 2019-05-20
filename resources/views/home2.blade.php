@extends('layouts.app')

@section('content')
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

<div class="container">


    <div class="card mb-3">
        <div class="card-body bg-dark text-center light-font">
            <h5>Mi cuenta.</h5>
        </div>
        <div class="card-body text-center">
            <h5>Nombre: {{ Auth::user()->name }}</h5>
            <h5>Edad: {{ Auth::user()->edad }} </h5>
            <h5>Mail: {{ Auth::user()->email }} </h5>
            <h5>Profesión: {{ Auth::user()->profesion }} </h5>
        </div>
        <div class="card-body text-center">
            <a href="/posts/create" class="btn btn-success">Crear Post</a>
            <a href="/users/edit/{{Auth::user()->user_id}}" class="btn btn-primary">Editar Perfil </a>
        </div>
    </div>


    <br>
    <hr>
    <br>
    <div class="card mb-3">
        <div class="card-body bg-dark text-center light-font">
            <h5>Mis imágenes.</h5>
        </div>
    </div>



    {{--
        
        @if(count($posts)>0)
        @foreach($posts as $post)
        <div class="card mb-3">
            <img class="card-img-top" src="{{ Cloudder::show($post->cover_image, ['width'=>'1.0', 'height'=>'1.0', 'format'=>'jpg'])}}" alt="Card image cap">
            <div class="card-body">
                
                <div class="row">
                    <div class="col">
                        <h4 class="card-title">{{$post->title}}</h4>
                        <p class="card-text">{{$post->body}}</p>
                        <p class="card-text"><small class="text-muted">Subido el: {{$post->created_at}}</small></p>
                    </div>
                    <div class="col-md-auto">
                    </div>
                <div class="col col-lg-2">
                    <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Editar</a>
                    {!!Form::open(['action'=>['PostsController@destroy',$post->id], 'method'=>'POST',
                    'class'=>'float-right'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Borrar', ['class'=>'btn btn-danger'])}}
                    {!!Form::close()!!}
                </div>
            </div>
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
    --}}
    
</div>


@endsection