@extends('layouts.app') 
@section('title',' | Inicio')
@section('content')
@include('sweetalert::alert')

<!-- Hero section -->
<section class="hero-section overflow-hidden">
    <div class="hero-slider owl-carousel">
        <div class="hero-item set-bg d-flex align-items-center justify-content-center text-center" data-setbg="img/slider-bg-1.jpg">
            <div class="container">
                <h2>GoodGame!</h2>
                <p style="color:wheat">Todos tus juegos en un solo lugar!</p>
                <a href="{{url('about')}}" class="site-btn">Leer más<img src="img/icons/double-arrow.png" alt="#" /></a>
            </div>
        </div>
        <div class="hero-item set-bg d-flex align-items-center justify-content-center text-center" data-setbg="img/slider-bg-2.jpg">
            <div class="container">
                <h3 style="color:wheat;margin-bottom:20px;">Crea listas, agrega todos tus juegos y compartilos!</h3>
                @auth
                    <a href="{{route('listings.create')}}" class="site-btn">Crear lista<img src="img/icons/double-arrow.png" alt="#" /></a>
                @endauth
                @guest
                    <a href="{{url('register')}}" class="site-btn">Registrarme<img src="img/icons/double-arrow.png" alt="#" /></a>
                @endguest
            </div>
        </div>
    </div>
</section>
<!-- Hero section end-->

<!-- Newsletter section -->
<section class="newsletter-section">
    <div class="container text-white">
        @auth
            <h3>Crea una lista acá <a href="/" style="color:wheat">acá</a></h3>
        @endauth
        @guest
            <h3><a href="{{url('register')}}" style="color:wheat">Registrate</a> y comenzá a crear tus listas!</h3>
        @endguest
    </div>
</section>
<!-- Newsletter section end -->

@endsection
