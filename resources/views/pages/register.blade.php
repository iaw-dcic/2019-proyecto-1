@extends('layouts.app') 
@section('title',' | Registro')

@section('content')
<!-- Page top section -->
<section class="page-top-section set-bg" data-setbg="img/page-top-bg/4.jpg">
    <div class="page-info">
        <h2>Registrarse</h2>
        <div class="site-breadcrumb">
            <a href="./">Inicio</a> /
            <span>Registrarse</span>
        </div>
    </div>
</section>
<!-- Page top end-->

<!-- Contact page -->
<section class="contact-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 order-2 order-lg-1">
                <form class="contact-form">
                    <input type="text" placeholder="Ingresa tu nombre">
                    <input type="text" placeholder="Ingresa un nombre de usuario">
                    <input type="text" placeholder="Ingresa tu dirección de email">
                    <input type="text" placeholder="Ingresa tu edad">
                    <button class="site-btn">Confirmar registro<img src="img/icons/double-arrow.png" alt="#" /></button>
                </form>
            </div>
            <div class="col-lg-5 order-1 order-lg-2 contact-text text-white">
                <h3>Bienvenido!</h3>
                <h5>Vas a poder guardar todos tus juegos , ... , ... , .... !</h5>
            </div>
        </div>
    </div>
</section>
<!-- Contact page end-->

<!-- Newsletter section -->
<section class="newsletter-section">
    <div class="container">
        <h2>Algun texto o funcionalidad o ver propiedades css</h2>
    </div>
</section>
<!-- Newsletter section end -->
@endsection