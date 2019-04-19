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
                <p>Todos tus juegos en un solo lugar!</p>
                <a href="{{url('about')}}" class="site-btn">Leer más<img src="img/icons/double-arrow.png" alt="#" /></a>
            </div>
        </div>
        <div class="hero-item set-bg d-flex align-items-center justify-content-center text-center" data-setbg="img/slider-bg-2.jpg">
            <div class="container">
                <h2>texto</h2>
                <p>otro texto</p>
                <a href="{{url('about')}}" class="site-btn">Leer más<img src="img/icons/double-arrow.png" alt="#" /></a>
            </div>
        </div>
    </div>
</section>
<!-- Hero section end-->

<!-- Newsletter section -->
<section class="newsletter-section">
    <div class="container">
        <h2>Algun texto o funcionalidad</h2>
    </div>
</section>
<!-- Newsletter section end -->

@endsection
