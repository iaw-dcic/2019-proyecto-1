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
  
       <!-- <div class="video-w3l" data-vide-bg="video/1"> -->
           
            <!-- content -->
            <div class="sub-main-w3">
                <form action="{{ route('games.update', $game->id) }}" method="post">
                    {{ method_field('PUT') }}
                     @csrf <!-- {{ csrf_field() }} -->
                    <div class="form-style-agile">
                        <label>
                            <i class="fas fa-gamepad"></i>Nombre del juego</label>
                        <input placeholder="Ej: CS GO" value="{{$game->title}}" name="title" type="text" required="">
                    </div>
                    <div class="form-style-agile">
                        <label>
                            <i class="fas fa-users"></i>Nombre de la empresa</label>
                        <input placeholder="company" value="{{$game->company}}" name="company" type="text">
                    </div>
                    
                    <input type="submit" value="Finalizar edición">
                </form>
            </div>
</section>
@endsection


