@extends('layouts.app') 
@section('title',' | Editar juego') 
@section('content')

<!-- Page top section -->
<section class="page-top-section set-bg" data-setbg="{{asset('/img/page-top-bg/4.jpg')}}">
    <div class="page-info">
        <h2>Editar juego</h2>
        <div class="site-breadcrumb">
            <a href="./">Inicio</a> /
            <span>Editar juego</span>
        </div>
    </div>
</section>
<!-- Page top end-->

<section class="contact-page">

    <!-- content -->
    <div class="sub-main-w3">
        <form action="{{ route('games.update', $game->id) }}" method="post" enctype="multipart/form-data">
            {{ method_field('PUT') }} @csrf
            <!-- {{ csrf_field() }} -->

            <!-- Name -->
            <div class="form-style-agile">
                <label>
                    <i class="fas fa-edit"></i>Nombre del juego</label>
                <input name="title" value="{{$game->title}}" type="text" required="">
            </div>

            <!-- Console -->
            <div class="form-style-agile">
                <label><i class="fas fa-gamepad"></i>¿En qué consola lo jugas?</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="platform" value="pc">
                    <label class="form-check-label">
                                        PC
                                </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="platform" value="ps4">
                    <label class="form-check-label">
                                        Playstation 4
                                </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="platform" value="ps3">
                    <label class="form-check-label">
                                      Playstation 3
                                </label>
                </div>

                <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="platform" value="ps3">
                        <label class="form-check-label">
                                          Otra
                                    </label>
                </div>

            </div>

            <!-- Rating -->
            <div class="form-style-agile">
                <label><i class="fas fa-thumbs-up"></i>¿Qué valoración le das?</label>
                <select type="text" class="custom-dropdown" name="rating">
                        <option disabled selected value style="display:none"> -- Selecciona una opción -- </option>
                        <option>Excelente</option>
                        <option>Muy bueno</option>
                        <option>Bueno</option>
                        <option>Regular</option>
                        <option>Malo</option>
                </select>
            </div>

            <!-- Cover image -->
            <div class="form-style-agile">
                <label><i class="fas fa-picture-o"></i>Portada</label>
                <br>
                <label class="btn btn-info">
                    Seleccionar <input type="file" hidden class="form-control-file" name="cover_image">
                </label>
            </div>


            <input type="submit" value="Finalizar edición">
        </form>
    </div>
</section>
@endsection