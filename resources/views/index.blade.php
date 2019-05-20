@extends('layouts.app_index')

@section('content')

{{-- imagen principal  --}}
<div class="container-fluid no-padding index_image">
    <!-- elementos sobre la imagen -->
    <div class="container h-100 text-center ">
        <div class="row h-50 justify-content-center align-items-center ">
            <div class="texto-index">
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

    @if (count($postsIndex)>0)

    <h3 class="text-center mb-3">Ejemplos</h3>

    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">

            @foreach ($postsIndex as $post)
                @if ($loop->first)
                    <div class="carousel-item carousel-fixed active">
                        <img class="d-block h-100"
                            src="{{Cloudder::show($post->cover_image, ['width'=>'1.0', 'height'=>'1.0', 'format'=>'jpg'])}}"
                            alt="First slide">
                    </div>
                @else
                    <div class="carousel-item carousel-fixed">
                        <img class="d-block h-100"
                            src="{{Cloudder::show($post->cover_image, ['width'=>'1.0', 'height'=>'1.0', 'format'=>'jpg'])}}"
                            alt="Second slide">
                    </div>
                @endif
            @endforeach
        </div>

        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    @endif

    <br>
    <hr>
    <br>



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