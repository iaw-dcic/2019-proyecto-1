@extends('layouts.app') 
@section('title',' | Agregar juego') 
@section('content')

<!-- Page top section -->
<section class="page-top-section set-bg" data-setbg="{{asset('/img/page-top-bg/2.webp')}}">
    <div class="page-info">
        <h2>Agregar juego</h2>
        <div class="site-breadcrumb">
            <a href="/">Inicio</a> /
            <a href="{{ url('listings') }}">Listas</a> /
            <span>Agregar juego</span>
        </div>
    </div>
</section>
<!-- Page top end-->

<section class="custom-form">

    <!-- <div class="video-w3l" data-vide-bg="video/1"> -->
    <h3 style="color:bisque; text-align:center;margin-bottom:20px"> Datos del juego </h3>

    <!-- content -->
    <div class="sub-main-w3">
        <form action="{{ route('games.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <!-- {{ csrf_field() }} -->

            <!-- Title-->
            <div class="form-style-agile">
                <label> <i class="fa fa-edit" aria-hidden="true"></i>Nombre del juego *</label>
                <input name="title" type="text" class="form-control" required>
            </div>

            <!-- Listings -->
            <div class="form-style-agile">
                <label><i class="fa fa-list-ul" aria-hidden="true"></i> ¿A qué listas pertenece este juego? *</label>
                <select class="selectpicker" name="listings[]" title="Seleccionar una o más listas" multiple data-live-search="true"
                    data-width="100%" required style="color:black">                            
                        @foreach($listings as $listing)
                            <option value="{{ $listing->id}}"> {{ $listing->title}} </option>
                        @endforeach
                </select>
            </div>

           
            <!-- Console -->
            <div class="form-style-agile">
                <label><i class="fa fa-gamepad" aria-hidden="true"></i>¿En qué consola lo jugas principalmente? *</label>
                <select type="text" class="custom-dropdown" name="console" required>
                        <option disabled selected value style="display:none"> -- Selecciona una consola -- </option>
                        <option>PC</option>
                        <option>Playstation 4</option>
                        <option>Xbox One</option>
                        <option>Nintendo Switch</option>
                        <option>Otra</option>
                </select>
            </div>

            <!-- Rating -->
            <div class="form-style-agile">
                <label><i class="fa fa-thumbs-up" aria-hidden="true"></i>¿Qué valoración le das? *</label>
                <select type="text" class="custom-dropdown" name="rating" required>
                        <option disabled selected value style="display:none"> -- Selecciona una valoración -- </option>
                        <option>Excelente</option>
                        <option>Muy bueno</option>
                        <option>Bueno</option>
                        <option>Regular</option>
                        <option>Malo</option>
                </select>
            </div>

            <!--Genre -->
            <div class="form-style-agile">
                <label><i class="fa fa-bomb" aria-hidden="true"></i> ¿A qué genero pertence el juego?*</label>
                <select type="text" class="custom-dropdown" name="genre" required>
                        <option disabled selected value style="display:none"> -- Selecciona un género-- </option>
                        <option>Accion</option>
                        <option>Disparos</option>
                        <option>Deportes</option>
                        <option>Aventura</option>
                        <option>Estrategia</option>
                        <option>Otro</option>
                </select>
            </div>

            <!--Mode -->
            <div class="form-style-agile">
                <label><i class="fa fa-users" aria-hidden="true"></i> ¿En qué modo lo jugas? *</label>
                <select type="text" class="custom-dropdown" name="mode" required>
                        <option disabled selected value style="display:none"> -- Selecciona un modo-- </option>
                        <option>Solitario</option>
                        <option>Multijugador</option>
                        <option>Solitario/Multijugador</option>
                </select>
            </div>

            <!-- Cover image -->
            <label><i class="fa fa-picture-o" aria-hidden="true"></i>Portada del juego</label>
            <div class="input-group" style="margin-bottom:10px;">
                        <label class="input-group-btn">
                            <span class="btn btn-primary">
                                Seleccionar&hellip; <input type="file" name="cover_image" style="display: none;">
                            </span>
                        </label>
                        <input type="text" class="form-control" readonly>
            </div>

            <label style="color:burlywood">Los campos marcados con un * son requeridos</label>

            <!-- Submit -->
            <input type="submit" value="Listo">

        </form>
    </div>
</section>
@endsection