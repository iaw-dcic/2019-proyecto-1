@extends('layouts.app') 
@section('title',' | Perfil') 
@section('content')
@include('sweetalert::alert')

<!-- Page top section -->
<section class="page-top-section set-bg" data-setbg="{{asset('img/page-top-bg/4.jpg')}}">
    <div class="page-info">
        <h2>Perfil</h2>
        <div class="site-breadcrumb">
            <a href="/">Inicio</a> /
            <span>{{$user->name}}</span>
        </div>
    </div>
</section>
<!-- Page top end-->
</section>
<!-- Page top end-->

<!-- Blog section -->
<section class="blog-section spad">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-8 col-md-7">
          
                <!-- Blog item -->
                <div class="blog-item">
                    <div class="blog-thumb">
                        <img src="./img/blog/1.jpg" alt="">
                    </div>
                    <div class="blog-text text-box text-white">
                        <h3>Información</h3>
                        <div class="top-meta">Nombre: {{$user->name}}</div>
                        <div class="top-meta">Email: {{$user->email}}</div>
                        <div class="top-meta">Listas: {{$listingsTitles}}</div>
                       
                        <br><br><br><br><br><br>
                        <a href="#" class="read-more">Editar avatar <img src="{{asset('img/icons/double-arrow.png')}}" alt="#"/></a>
                        
                    </div>
                </div>
            
            
            </div>
            <div class="col-xl-3 col-lg-4 col-md-5 sidebar">
                <div id="stickySidebar">

                    <div class="widget-item">
                        <div class="categories-widget">
                            <h4 class="widget-title">Secciones</h4>
                            <ul>
                                <li><a href="">Inicio</a></li>
                                <li><a href="">Mis juegos</a></li>
                                <li><a href="">Agregar juego</a></li>
                                <li><a href="">Preguntas frecuentes</a></li>
                                <li><a href="">Community</a></li>
                                <li><a href="">Uncategorized</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog section end -->



@endsection