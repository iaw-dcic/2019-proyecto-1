@extends('layouts.app') 
@section('search-specific-style')
<link rel="stylesheet" href="{{ URL::asset('/css/search-table-main.css') }}"> 
@stop 
@section('title',' | Listas') 
@section('content')
    @include('sweetalert::alert')


<!-- Page top section -->
<section class="page-top-section set-bg" data-setbg="{{asset('/img/page-top-bg/4.jpg')}}">
    <div class="page-info">
        <h2>Listas</h2>
        <div class="site-breadcrumb">
            <a href="/">Inicio</a> /
            <span>Listas</span>
        </div>
    </div>
</section>
<!-- Page top end-->



<div class="limiter">

    <div class="container-table100">

        <div class="wrap-table100">

            @if (count($data['listings']) >0) 

                <!--Show lists -->
                <h3 style="color:bisque; text-align:center"> Listas de {{$data['listOwnerName']}} </h3>

                <div class="my-table" style="margin-bottom:30px">
                    <br>
                    <div class="my-row header no-hover">
                        <div class="cell">
                            Nombre de la lista
                        </div>
                        <div class="cell">
                            Cantidad de juegos
                        </div>
                        @auth
                        <div class="cell">
                            Visibilidad
                        </div>
                        @endauth
                        <div class="cell">
                            Lista
                        </div>
                        @guest
                        <div class="cell">
                            Perfil del usuario
                        </div>
                        @endguest
                    </div>
                    @foreach($data['listings'] as $listing)
                    <div class="my-row">
                        <div class="cell" data-title="Titulo de la lista">
                            {{$listing->title}}
                        </div>

                        <div class="cell" data-title="Cantidad de juegos">
                            {{$listing->games()->count()}}
                        </div>
                        @auth
                        <div class="cell" data-title="Visibilidad">
                                {{$listing->visibility}}
                        </div>
                        @endauth

                        <div class="cell" data-title="Link a la lista">
                            <a href="{{route('listings.show',$listing->id)}}">Link a la lista</a>
                        </div>
                        @guest
                        <div class="cell" data-title="Link al perfil">
                            <a href="">Link al perfil</a>
                        </div>
                        @endguest
                    </div>

                    @endforeach



                </div>
                @auth
                <a href="{{route('listings.create') }}" class="site-btn">Crear otra lista<img src="{{asset('img/icons/double-arrow.png')}}" alt="#"/></a>
                @endauth
    
            @else 
                @guest
                    <h2 style="color:white; margin-bottom:20px;" > {{$data['listOwnerName']}} todavía no tiene ninguna lista!</h2>
                @endguest
                @auth
                    <h2 style="color:white; margin-bottom:20px;" > Todavía no tenes ninguna lista!</h2>
                    <a href="{{route('listings.create') }}" class="site-btn">Crear lista<img src="{{asset('img/icons/double-arrow.png')}}" alt="#"/></a>
                @endauth

            @endif
         
        </div>

    </div>
</div>



</section>



@endsection