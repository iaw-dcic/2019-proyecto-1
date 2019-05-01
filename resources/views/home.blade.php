@extends('layouts.layout')
@section('pagina-principal')
    <div class="container-fluid m-0 p-0">
        <header>
            <!--Navbar-->
            @include('partials.navbar')
        </header>
    </div>

   @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

   <!--Barra actividad-->
   <div class="row no-gutters barra-actividad" id="actividad-publica">
        <div class="col">
            <a href="#"><span class="active">Actividad pública</span></a>
        </div>
    </div>
    <!--Actividad pública-->
    @include('partials.articles')
    <!--Footer-->
    @include('partials.footer')
@endsection()
