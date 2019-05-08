@extends('layouts.app') 
@section('title',' | Crear lista') 
@section('content')
@include('sweetalert::alert')

<!-- Page top section -->
<section class="page-top-section set-bg" data-setbg="{{asset('/img/page-top-bg/4.webp')}}">
    <div class="page-info">
        <h2>Crear lista</h2>
        <div class="site-breadcrumb">
            <a href="/">Inicio</a> /
            <a href="{{ url('listings') }}">Listas</a> /
            <span>Crear lista</span>
        </div>
    </div>
</section>
<!-- Page top end-->

<section class="custom-form">

    <!-- <div class="video-w3l" data-vide-bg="video/1"> -->
    <h3 style="color:bisque; text-align:center;margin-bottom:20px"> Crear lista</h3>

    <!-- content -->
    <div class="sub-main-w3">
        <form action="{{ route('listings.store') }}" method="post">
            @csrf
            <!-- {{ csrf_field() }} -->

            <!-- Title -->
            <div class="form-style-agile">
                <label> <i class="fa fa-edit" aria-hidden="true"></i>Nombre de la lista *</label>
                <input name="title" type="text" class="form-control" required>
            </div>

            <!-- Visibility -->
            <div class="form-style-agile">
                <label><i class="fa fa-eye" aria-hidden="true"></i>¿Cómo queres que sea la lista? *</label>
                <select type="text" class="custom-dropdown" name="visibility" required>
                        <option disabled selected value style="display:none"> -- Selecciona una opción -- </option>
                        <option>Publica</option>
                        <option>Privada</option>                          
                </select>
            </div>
           
            <label style="color:burlywood">Los campos marcados con un * son requeridos</label>

            <!-- Submit -->
            <input type="submit" value="Listo">

        </form>
    </div>
</section>
@endsection