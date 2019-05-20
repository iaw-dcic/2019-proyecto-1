@extends('layouts.app')

@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

<div class="container mt-4">

    <div class="text-center mb-4">
        <h4>Acá podrás ver todas las listas compartidas por los usuarios.</h4>
    </div>

    @if (count($collections)>0)
    <div class="d-flex flex-wrap justify-content-around">

        @foreach ($collections as $collection)

        <div class="card m-2" style="width: 25rem;">

            <div id="carouselExampleControls{{$collection->id}}" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @if (count($collection->posts)>0)

                    @foreach ($collection->posts as $post)
                    @if ($loop->first)
                    <div class="carousel-item active carousel-fixed" style="height: 20rem !important;">

                        <img class="d-block h-100"
                            src="{{Cloudder::show($post->cover_image, ['width'=>'1.0', 'height'=>'1.0', 'format'=>'jpg'])}}"
                            alt="First slide">

                    </div>
                    @else
                    <div class="carousel-item carousel-fixed" style="height: 20rem !important;">

                        <img class="d-block h-100"
                            src="{{Cloudder::show($post->cover_image, ['width'=>'1.0', 'height'=>'1.0', 'format'=>'jpg'])}}"
                            alt="First slide">

                    </div>
                    @endif
                    @endforeach
                    @else
                    <div class="carousel-item active carousel-fixed" style="height: 20rem !important;">

                        <img class="d-block h-100 " src="/img/empty-photo.jpg" alt="First slide">

                    </div>

                    @endif

                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls{{$collection->id}}" role="button"
                    data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls{{$collection->id}}" role="button"
                    data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <div class="card-body">
                <div class="card-text">
                    <h5><a href="/collections/{{$collection->id}}">{{$collection->collection_name}}</a></h5>
                    <small>Subido por <a href="/users/{{$collection->user->id}}">{{$collection->user->name}}</a></small>
                </div>
            </div>
        </div>
        @endforeach

    </div>
    @else
    <h2>En este momento no hay listas.</h2>
    @endif
</div>


@endsection