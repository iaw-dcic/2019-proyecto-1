@extends('layouts.app')

@section('sectioncontent')
<section id="hero">
    <div class="hero-container">
        <h1>Bienvenido</h1>
        <h2></h2>
        <a href="#services" class="btn-get-started">Listas Públicas</a>
    </div>
</section><!-- #hero -->

<!--==========================
      Services Section
    ============================-->
<section id="services">
    <div class="container wow fadeIn">
        <div class="section-header">
            <h3 class="section-title">Listas Públicas</h3>
            <p class="section-description"> </p>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                <div class="box additemsdiv scrollbar-primary">
                    <div class="icon"><a href=""><i class="fa fa-desktop"></i></a></div>
                    <h4 class="title"><a href="">Lorem Ipsum</a></h4>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Cras justo odio
                            <span class="badge badge-primary badge-pill">14</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Dapibus ac facilisis in
                            <span class="badge badge-primary badge-pill">2</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Morbi leo risus
                            <span class="badge badge-primary badge-pill">1</span>
                        </li>
                    </ul>
                    <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                <div class="box">
                    <div class="icon"><a href=""><i class="fa fa-bar-chart"></i></a></div>
                    <h4 class="title"><a href="">Dolor Sitema</a></h4>
                    <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                <div class="box">
                    <div class="icon"><a href=""><i class="fa fa-paper-plane"></i></a></div>
                    <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
                    <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
                </div>
            </div>

        </div>

    </div>
</section><!-- #services -->
@endsection