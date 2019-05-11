@extends('layouts.app_index')

@section('content')

{{-- primer imagen.  --}}
<div class="container-fluid no-padding index_image">
    <!-- elementos sobre la imagen -->
    <div class="container h-100 text-center ">
        <div class="row h-50 justify-content-center align-items-center ">
            <div>
                <h1>¡Bienvenido a PhotoStore!</h1>
                <h4>Aquí podrás ver y compartir contenido fotográfico.</h4>
            </div>
        </div>
    </div>
</div>


<div class="container">

    <br>
    <hr>
    <br>

    @foreach ($postsIndex as $key=>$post)
    @if(($key % 2 )==0)

    <div class="media">
        <img class="align-self-center mr-5" src="/storage/cover_images/{{$post->cover_image}}"
            alt="Generic placeholder image" width="60%">
        <div class="media-body align-middle">
            <h4>By: {{$post->user->name}}</h4>
            <h5>{{$post->title}}</h5>
            <p>{{$post->body}}</p>
        </div>
    </div>

    <br>
    <hr>
    <br>

    @else

    <div class="media">
        <div class="media-body align-middle">
            <h4>By: {{$post->user->name}}</h4>
            <h5>{{$post->title}}</h5>
            <p>{{$post->body}}</p>
        </div>
        <img class="align-self-center ml-5" src="/storage/cover_images/{{$post->cover_image}}"
            alt="Generic placeholder image" width="60%">
    </div>

    <br>
    <hr>
    <br>

    @endif

    @endforeach


</div>

<div class="container">


    <div class="row">
        <div class="col-md-6 text-center">
            <div class="numberCircle text-center">{{count($users)}}</div>
            <br>
            <br>
            <h2 class="text-center">Usuarios Registrados</h2>
        </div>
        <div class="col-md-6 text-center">
            <div class="numberCircle text-center">{{count($posts)}}</div>
            <br>
            <br>
            <h2 class="text-center">Fotos Publicadas</h2>
        </div>

    </div>
    <br>
    <br>
</div>


@endsection