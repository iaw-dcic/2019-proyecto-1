@extends('layouts.app') 
@section('title',' | Editar juego') 
@section('content')
@include('sweetalert::alert')

<!-- Page top section -->
<section class="page-top-section set-bg" data-setbg="{{asset('/img/page-top-bg/4.jpg')}}">
    <div class="page-info">
        <h2>Editar juego</h2>
        <div class="site-breadcrumb">
            <a href="./">Inicio</a> /
            <a href="{{ url('games') }}">Juegos</a> /
            <span>Editar juego</span>
        </div>
    </div>
</section>

<!-- Page top end-->

<section class="contact-page">
        <h3 style="color:bisque; text-align:center"> Editando <span style="color:azure">{{$game->title}} </span></h3> <br><br>
    <!-- content -->
    <div class="sub-main-w3">
        <form action="{{ route('games.update', $game->id) }}" method="post" enctype="multipart/form-data">
            {{ method_field('PUT') }} @csrf
            <!-- {{ csrf_field() }} -->

            <!-- Title -->
            <div class="form-style-agile">
                <label>
                    <i class="fas fa-edit"></i>Nombre del juego</label>
                <input name="title" value="{{ $game->title }}" type="text" required="">
                <div class="invalid-feedback">
                    El nombre es obligatorio
                </div>
            </div>

             <!-- Listings -->
             <div class="form-style-agile">
                    <label><i class="fas fa-list-ul" aria-hidden="true"></i> ¿A qué listas pertenece este juego? *</label>
                        <select class="selectpicker" name="listings[]" title="Seleccionar una o más listas" multiple data-live-search="true" data-style="btn-primary" data-width="100%" required>
                                @foreach($listings as $listing)
                                   <option value="{{ $listing->id}}"> {{ $listing->title}} </option>
                                @endforeach
                        </select> 
            </div>
         

            <!-- Console -->
            <div class="form-style-agile">
                <label><i class="fas fa-gamepad" aria-hidden="true"></i>¿En qué consola lo jugas principalmente? *</label>
                <select type="text" class="custom-dropdown" name="console" required>
                    <option disabled selected value style="display:none"> -- Selecciona una consola -- </option>
                    <option {{ $game->console == 'PC' ? 'selected' : '' }}>PC</option>
                    <option {{ $game->console == 'Playstation 4' ? 'selected' : '' }}>Playstation 4</option>
                    <option {{ $game->console == 'Xbox One' ? 'selected' : '' }}>Xbox One</option>
                    <option {{ $game->console == 'Nintendo Switch' ? 'selected' : '' }}>Nintendo Switch</option>
                    <option>Otra</option>
                </select>
            </div>

            <!-- Rating -->
            <div class="form-style-agile">
                <label><i class="fas fa-thumbs-up"></i>¿Qué valoración le das?</label>
                <select type="text" class="custom-dropdown" name="rating" required>
                    <option disabled selected value style="display:none"> -- Selecciona una opción -- </option>
                    <option {{ $game->rating == 'Excelente' ? 'selected' : '' }}>Excelente</option>
                    <option {{ $game->rating == 'Muy bueno' ? 'selected' : '' }}>Muy bueno</option>
                    <option {{ $game->rating == 'Bueno' ? 'selected' : '' }}>Bueno</option>
                    <option {{ $game->rating == 'Regular' ? 'selected' : '' }}>Regular</option>
                    <option {{ $game->rating == 'Malo' ? 'selected' : '' }}>Malo</option>
                </select>
            </div>

             <!--Genre -->
             <div class="form-style-agile">
                    <label><i class="fas fa-bomb" aria-hidden="true"></i> ¿A qué género pertence el juego?*</label>
                    <select type="text" class="custom-dropdown" name="genre" required>
                              <option disabled selected value style="display:none"> -- Selecciona un género-- </option>
                              <option {{ $game->genre == 'Accion' ? 'selected' : '' }}>Accion</option>
                              <option {{ $game->genre == 'Disparos' ? 'selected' : '' }}>Disparos</option>
                              <option {{ $game->genre == 'Deportes' ? 'selected' : '' }}>Deportes</option>
                              <option {{ $game->genre == 'Aventura' ? 'selected' : '' }}>Aventura</option>
                              <option {{ $game->genre == 'Estrategia' ? 'selected' : '' }}>Estrategia</option>
                              <option {{ $game->genre == 'Otro' ? 'selected' : '' }}>Otro</option>
                    </select>
            </div>    

            <!--Mode -->
            <div class="form-style-agile">
                    <label><i class="fas fa-users" aria-hidden="true"></i> ¿En qué modo lo jugas? *</label>
                    <select type="text" class="custom-dropdown" name="mode" required>
                              <option disabled selected value style="display:none"> -- Selecciona un modo-- </option>
                              <option {{ $game->mode == 'Solitario' ? 'selected' : '' }}>Solitario</option>
                              <option {{ $game->mode == 'Multijugador' ? 'selected' : '' }}>Multijugador</option>
                              <option {{ $game->mode == 'Solitario/Multijugador' ? 'selected' : '' }}>Solitario/Multijugador</option>
                    </select>
            </div>    

            <!-- Cover image -->
            <label><i class="fas fa-picture-o" aria-hidden="true"></i>Portada del juego</label>
            <div class="input-group">
                <label class="input-group-btn">
                           <span class="btn btn-primary">
                               Seleccionar&hellip; <input type="file" name="cover_image" style="display: none;">
                           </span>
                       </label>
                <input type="text" class="form-control" value="{{$game->cover_image}}" readonly>
                <br><br>
            </div>

            <label style="color:burlywood">Los campos marcados con un * son requeridos</label>


            <input type="submit" value="Finalizar edición">
        </form>
    </div>
</section>
@endsection