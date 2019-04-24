@extends('layouts.app') 
@section('search-specific-style')
<link rel="stylesheet" href="{{ URL::asset('/css/search-table-main.css') }}"> 
@stop 
@section('title',' | Listas') 
@section('content')

<!-- Page top section -->
<section class="page-top-section set-bg" data-setbg="{{asset('/img/page-top-bg/4.jpg')}}">
    <div class="page-info">
        <h2>Listas</h2>
        <div class="site-breadcrumb">
            <a href="/">Inicio</a> /
            <span>Listas</span>
        </div>
    </div>
</section>
<!-- Page top end-->



<!-- Review section -->

<div class="limiter">
    <div class="container-table100">
        <div class="wrap-table100">
            <h3 style="color:bisque; text-align:center"> Listas de {{$data['listOwnerName']}} </h3>

            <div class="table">
                <br>
                <div class="row header no-hover">
                    <div class="cell">
                        Nombre de la lista
                    </div>
                    <div class="cell">
                        ¿Es pública?
                    </div>
                    <div class="cell">
                        Ver lista
                    </div>
                    @guest
                    <div class="cell">
                        Perfil del usuario
                    </div>
                    @endguest
                </div>
                @foreach($data['listings'] as $listing)
                <div class="row">
                    <div class="cell" data-title="Full Name">
                        {{$listing->title}}
                    </div>
                    <div class="cell" data-title="Age">

                    @if($listing->visibility == 'Publica') Si
                    @else No     @endif


                    </div>
                    <div class="cell" data-title="Job Title">
                        <a href="">Link a la lista</a>
                    </div>
                    @guest
                    <div class="cell" data-title="Location">
                        <a href="">Link al perfil</a>
                    </div>
                    @endguest
                </div>

                @endforeach



            </div>
        </div>
    </div>
</div>



<!-- Review section end-->
@endsection