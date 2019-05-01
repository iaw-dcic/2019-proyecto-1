@extends('layouts.layout')
@section('pagina-principal')
    <div class="container-fluid m-0 p-0 no-gutters contenedor-principal fondo-login">
        <header class="header-nav-only">
            <!--Navbar-->
            @include('partials.navbar')
        </header>
        @include('partials.register.form-login')
        <!--Footer-->
        @include('partials.footer')
    </div>
@endsection()
