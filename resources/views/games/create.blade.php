@extends('layouts.app') 
@section('title',' | Agregar juego') 
@section('content')

<!-- Page top section -->
<section class="page-top-section set-bg" data-setbg="{{asset('/img/page-top-bg/4.jpg')}}">
    <div class="page-info">
        <h2>Agregar juego</h2>
        <div class="site-breadcrumb">
            <a href="/">Inicio</a> /
            <a href="{{ url('games') }}">Juegos</a> /
            <span>Agregar juego</span>
        </div>
    </div>
</section>
<!-- Page top end-->

<section class="contact-page">

    <!-- <div class="video-w3l" data-vide-bg="video/1"> -->

    <!-- content -->
    <div class="sub-main-w3">
        <form action="{{ route('games.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <!-- {{ csrf_field() }} -->
            <!-- Name -->
            <div class="form-style-agile">
                <label> <i class="fas fa-edit" aria-hidden="true"></i>Nombre del juego </label>
                <input name="title" type="text" class="form-control" required>
                <div class="invalid-feedback">
                    El nombre es obligatorio
                 </div>
            </div>

            <!-- Console -->
            <div class="form-style-agile">
                <label><i class="fas fa-gamepad" aria-hidden="true"></i>¿En qué consola lo jugas principalmente?</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="console" value="PC" required>
                    <label class="form-check-label">
                            PC
                    </label>

                    <div class="invalid-feedback">
                        La selección de una consola es obligatoria
                     </div>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="console" value="Playstation 4" required>
                    <label class="form-check-label">
                            Playstation 4
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="console" value="Xbox One" required>
                    <label class="form-check-label">
                          Xbox One
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="console" value="Nintendo Switch" required>
                    <label class="form-check-label">
                          Nintendo Switch
                    </label>
                </div>

                <div class="form-check">
                        <input class="form-check-input" type="radio" name="console" value="Otra" required>
                        <label class="form-check-label">
                            Otra
                        </label>
                </div>

            </div>

             <!-- Rating -->
            <div class="form-style-agile">
                <label><i class="fas fa-thumbs-up" aria-hidden="true"></i>¿Qué valoración le das?</label>
                <select type="text" class="custom-dropdown" name="rating" required>
                          <option disabled selected value style="display:none"> -- Selecciona una opción -- </option>
                          <option>Excelente</option>
                          <option>Muy bueno</option>
                          <option>Bueno</option>
                          <option>Regular</option>
                          <option>Malo</option>
                        </select>
                        <div class="invalid-feedback">Example invalid custom select feedback</div>
            </div>

             <!-- Cover image -->
            <div class="form-style-agile">
                <label><i class="fas fa-picture-o" aria-hidden="true"></i>Portada</label>
                <br>
                <label class="btn btn-info">
                       Seleccionar <input type="file" hidden class="form-control-file" name="cover_image">
                </label>             
            </div>
           

            <input type="submit" value="Listo">

        </form>
    </div>
</section>
@endsection

