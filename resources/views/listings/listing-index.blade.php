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

@guest

<div class="games-section">
    <div class="container">
        
            <div class="row">
                    <div class="col-xl-9 col-lg-8 col-md-7">
                        <ul class="blog-filter">
                            <li><a href="{{route('login')}}">Iniciar sesión</a></li>
                            <li><a href="#">Registrarse</a></li>
                            <li><a href="#">Preguntas frecuentes</a></li>
                        </ul>
                        <br><br>
                        <div class="big-blog-item">
                            <div class="blog-content text-box text-white">
                                <h3 style="color:bisque">Buscar otros usuarios: </h3>
                                <div class="widget-item">
                                    <form class="search-widget" action="{{url('searchUser') }}" method="get">
                                        @csrf
                                        <input name="searchTerm" type="text" placeholder="Ingresar el nombre...">
                                        <button><i class="fa fa-search" aria-hidden="true"></i>  Buscar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
            
            
                    </div>
            
            </div>
    </div>
        
</div>
@endguest

@auth 
        <div class="limiter">
    
                <div class="container-table100">
            
               
                
                        <div class="wrap-table100">
                           
                            <h3 style="color:bisque; text-align:center"> Listas de {{$data['listOwnerName']}} </h3>
            
                            <div class="my-table">
                                <br>
                                <div class="my-row header no-hover">
                                    <div class="cell">
                                        Nombre de la lista
                                    </div>
                                    <div class="cell">
                                        Cantidad de juegos
                                    </div>
                                    <div class="cell">
                                        ¿Es pública?
                                    </div>
                                    <div class="cell">
                                        Ver lista
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
            
                                    <div class="cell" data-title="¿Pública o privada?">
                                        @if($listing->visibility == 'Publica') Si @else No @endif
                                    </div>
            
            
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
                        </div>
                       <!-- <div class="my-row">
                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    <div class="text-white">
                                        <h3>Todavía no tenes ninguna lista!</h3>
                                        <br><br>
                                    </div>
                                    <a href="{{route('listings.create') }}" class="site-btn">Crear una lista<img src="{{asset('img/icons/double-arrow.png')}}" alt="#"/></a>
                                </div>
                        </div> -->
                @endauth
               
                
                        
                </div>
        </div>
            
           

</section>




<!-- Review section end-->
@endsection