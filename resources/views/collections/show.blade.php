@extends('layouts.app')

@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

<div class="container mt-4">

    <div class="text-center mb-4">
        <h2>Imágenes de la lista '{{$collection->collection_name}}'</h2>
        <p>De <a href="/users/{{$collection->user->id}}">{{$collection->user->name}}</a></p>
    </div>

    @if (count($collection->posts)>0)
    <div class="d-flex flex-wrap justify-content-around">

        @foreach ($collection->posts as $post)

        <div class="card m-2" style="width: 30rem;">
            <img class="card-img-top" src="{{Cloudder::show($post->cover_image, ['width'=>'1.0', 'height'=>'1.0', 'format'=>'jpg'])}}" alt="Card image cap">
            <div class="card-body">
                <div class="card-text">
                    <h5>{{$post->title}}</h5>
                    <p>{{$post->body}}</p>
                    <small>Subido por <a href="user/{{$collection}}"></a>{{$collection->user->name}}</a></small>
                </div>
            </div>
        </div>
        @endforeach

    </div>
    @else
    <h2>En este momento no hay imágenes.</h2>
    @endif

</div>

@endsection