@extends('layouts.app') 
@section('title',' | Buscar listas') 
@section('content')

<!-- Page top section -->
<section class="page-top-section set-bg" data-setbg="{{asset('/img/page-top-bg/4.jpg')}}">
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
                                <li><a href="{{route('login')}}">Iniciar sesión</a></li>
                                <li><a href="#">Registrarse</a></li>
                                <li><a href="#">Preguntas frecuentes</a></li>
                            </ul>
                            <br><br>
                            <div class="big-blog-item">
                                <div class="blog-content text-box text-white">
                                    <h3 style="color:bisque">Buscar listas de otros usuarios: </h3>
                                    <div class="widget-item">
                                        <form class="search-widget" action="{{url('searchUser') }}" method="get">
                                            @csrf
                                            <input name="searchTerm" type="text" placeholder="Ingresar nombre de usuario o juego...">
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