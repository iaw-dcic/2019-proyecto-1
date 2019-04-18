@extends('layouts.app') 
@section('title',' | Agregar juego') 
@section('content')

<!-- Page top section -->
<section class="page-top-section set-bg" data-setbg="{{asset('/img/page-top-bg/4.jpg')}}">
    <div class="page-info">
        <h2>Agregar juego</h2>
        <div class="site-breadcrumb">
            <a href="/">Inicio</a> /
            <span>Agregar juego</span>
        </div>
    </div>
</section>
<!-- Page top end-->

<section class="contact-page">

    <!-- <div class="video-w3l" data-vide-bg="video/1"> -->

    <!-- content -->
    <div class="sub-main-w3">
        <form action="{{ route('games.store') }}" method="post">
            @csrf
            <!-- {{ csrf_field() }} -->
            <div class="form-style-agile">
                <label>
                            <i class="fas fa-edit"></i>Nombre del juego</label>
                <input name="title" type="text" required="">
            </div>

            <div class="form-style-agile">
                <label><i class="fas fa-gamepad"></i>¿En qué consola lo jugas?</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="platform" value="pc">
                    <label class="form-check-label">
                            PC
                    </label>
                </div>
                <div class="form-check" name="platform">
                    <input class="form-check-input" type="checkbox"  name="platform" value="ps4">
                    <label class="form-check-label">
                            Playstation 4
                    </label>
                </div>

                <div class="form-check" name="platform">
                    <input class="form-check-input" type="checkbox"  name="platform" value="ps3">
                    <label class="form-check-label">
                          Playstation 3
                    </label>
                </div>

            </div>

            <div class="form-style-agile">
                <label><i class="fas fa-thumbs-up"></i>¿Qué valoración le das?</label>
                <select type="text" class="custom-dropdown" name="rating">
                          <option>Excelente</option>
                          <option>Muy bueno</option>
                          <option>Bueno</option>
                          <option>Regular</option>
                          <option>Malo</option>
                        </select>
            </div>

            <input type="submit" value="Listo">

        </form>
    </div>
</section>
@endsection