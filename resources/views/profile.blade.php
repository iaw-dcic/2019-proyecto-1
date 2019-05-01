@extends('layouts.layout')
@section('pagina-principal')
    <div class="container-fluid m-0 p-0 no-gutters contenedor-principal">
        <div class="container-fluid m-0 p-0">
            <header>
                <!--Navbar-->
                @include('partials.navbar')
            </header>
        </div>

        <!--Profile-->
        @include('partials.profile.view-profile')

        <!--Footer-->
        @include('partials.footer')
    </div>
@endsection()
