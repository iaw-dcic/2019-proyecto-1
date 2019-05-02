@extends('layouts.layout')
@section('pagina-principal')
    <div class="container-fluid m-0 p-0">
        <!--Carousel-->
       @include('partials.index.carousel')
       <header class="pantalla-principal">
           <!--Navbar-->
           @include('partials.navbar')
           @include('partials.index.slogans')
       </header>
   </div>

   @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

   <!--Barra actividad-->
   <div class="row no-gutters barra-actividad" id="actividad-publica">
        <div class="col d-flex justify-content-center justify-content-md-start ml-0 ml-md-5">
            <a href="#"><span class="active">Actividad pública</span></a>
        </div>
    </div>
   <!--Actividad pública-->
   @include('partials.articles')
   <!--Footer-->
   @include('partials.footer')
@endsection()
