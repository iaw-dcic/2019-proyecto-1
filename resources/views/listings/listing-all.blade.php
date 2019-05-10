@extends('layouts.app') 
@section('search-specific-style')
<link rel="stylesheet" href="{{ URL::asset('/css/search-table-main.css') }}"> 
@stop 
@section('title',' | Listas públicas') 
@section('content')
@include('sweetalert::alert')


<!-- Page top section -->
<section class="page-top-section set-bg" data-setbg="{{asset('/img/page-top-bg/1.webp')}}">
    <div class="page-info">
        <h2>Listas públicas</h2>
        <div class="site-breadcrumb">
            <a href="/">Inicio</a> /
            <span>Listas públicas</span>
        </div>
    </div>
</section>
<!-- Page top end-->

<div class="limiter">
    <div class="container-table100">
        <div class="wrap-table100">
            @if (count($data) >0) 

                <!--Show lists -->
                <h3 style="color:bisque; text-align:center"> Listas públicas </h3>

                <div class="my-table" style="margin-bottom:30px;margin-top:30px;">
                    <div class="my-row header no-hover">
                        <div class="cell">
                            Nombre 
                        </div>
                        <div class="cell">
                            Dueño 
                        </div>
                        <div class="cell">
                            Cantidad de juegos
                        </div>
                       
                        <div class="cell">
                            Lista
                        </div>  
         
                        <div class="cell">
                             Perfil 
                        </div>
                    </div>

                    @foreach($data as $listing)
                        <div class="my-row">
                            <div class="cell" data-title="Titulo de la lista">
                                {{$listing['listing']->title}}
                            </div>
                            <div class="cell" data-title="Dueño de la lista">
                                {{$listing['owner']}}
                            </div>
                            <div class="cell" data-title="Cantidad de juegos">
                                {{$listing['listing']->games()->count()}}
                            </div>
                            <div class="cell" data-title="Link a la lista">
                                <a href="{{route('listings.show',$listing['listing']->id)}}">Link a la lista</a>
                            </div>

                            <div class="cell" data-title="Link al perfil">
                                <a href="{{route('user_profile',$listing['listing']->user_id)}}">Ver</a>
                            </div>
                        </div>
                    @endforeach
                    <div class="text-center" style="margin-top:30px">
                        {{$listings->links()}}
                    </div>

                </div>
              
            @else 
                <h2 style="color:white; margin-bottom:20px;" > No encontramos ninguna lista pública</h2>
            @endif      
        </div>
    </div>
</div>
</section>
@endsection