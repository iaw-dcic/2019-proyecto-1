@extends('layouts.app') 
@section('title',' | Buscar listas') 
@section('content')
@include('sweetalert::alert')

<!-- Page top section -->
<section class="page-top-section set-bg" data-setbg="{{asset('/img/page-top-bg/3.webp')}}">
    <div class="page-info">
        <h2>Buscar listas</h2>
        <div class="site-breadcrumb">
            <a href="/">Inicio</a> /
            <a href="{{ url('games') }}">Listas</a> /
            <span>Buscar listas</span>
        </div>
    </div>
</section>
<!-- Page top end-->

<div class="games-section">
        <div class="container">
            
                <div class="row">
                        <div class="col-xl-9 col-lg-8 col-md-7">
                            <ul class="blog-filter">
                                @guest
                                    <li><a href="{{route('login')}}">Iniciar sesión</a></li>
                                    <li><a href="{{route('register')}}">Registrarse</a></li>  
                                    <li><a href="{{url('about')}}">Preguntas frecuentes</a></li>
                                @endguest
                            </ul>
                            <br><br>
                            <div class="big-blog-item">
                                <div class="blog-content text-box text-white">
                                    <h3 style="color:bisque">Buscar listas de otros usuarios: </h3>
                                    <div class="widget-item">
                                        <form class="search-widget" action="{{url('searchUser') }}" method="get">
                                            @csrf
                                            <input autofocus name="searchTerm" type="text" placeholder="Escribí acá el nombre del usuario y hace click en buscar">
                                            <button><i class="fa fa-search" aria-hidden="true"></i>  Buscar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                
                
                        </div>
                
                </div>
        </div>
            
</div>

@endsection