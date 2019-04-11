@extends('layouts.app') 
@section('title',' | Login')

@section('content')

<!-- Page top section -->
<section class="page-top-section set-bg" data-setbg="img/page-top-bg/4.jpg">
    <div class="page-info">
        <h2>Ingresar</h2>
        <div class="site-breadcrumb">
            <a href="./">Inicio</a> /
            <span>Ingresar</span>
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
                    <input type="text" placeholder="Your name">
                    <input type="text" placeholder="Your e-mail">
                    <input type="text" placeholder="Subject">
                    <textarea placeholder="Message"></textarea>
                    <button class="site-btn">Send message<img src="img/icons/double-arrow.png" alt="#" /></button>
                </form>
            </div>
            <div class="col-lg-5 order-1 order-lg-2 contact-text text-white">
                <h3>Howdy! Say hello</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                    magna aliqua. Quis ipsum suspendisse ultrices gravida. Lorem ipsum dolor sit amet, consectetur adipiscing
                    elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.....</p>
                <div class="cont-info">
                    <div class="ci-icon"><img src="img/icons/location.png" alt=""></div>
                    <div class="ci-text">Main Str, no 23, New York</div>
                </div>
                <div class="cont-info">
                    <div class="ci-icon"><img src="img/icons/phone.png" alt=""></div>
                    <div class="ci-text">+546 990221 123</div>
                </div>
                <div class="cont-info">
                    <div class="ci-icon"><img src="img/icons/mail.png" alt=""></div>
                    <div class="ci-text">hosting@contact.com</div>
                </div>
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