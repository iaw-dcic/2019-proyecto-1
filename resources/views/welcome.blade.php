@extends('layouts.app')
       
        @section('titulo')
            Catalogo de Juegos
        @endsection

        @section('extraStyles')
            <link href="{{ asset('css/homeStyle.css') }}" rel="stylesheet">
            <link href= "{{asset('css/reason1Color.css')}}" rel="stylesheet">
            <!-- Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Raleway|Quicksand|Nunito:200,600" rel="stylesheet">
        @endsection
       
        @section('leftNav')
            <a href="{{ route('readme') }}" class="btn btn-outline-secondary"> readme </a>
            <a href="{{route('public_Lists') }}" class="btn btn-outline-success"> Ver listas Publicas </a>
        @endsection

    @section('extraContent')
        <div class="position-ref full-height container-fluid">
          
            <div class="content">
                <div class="title m-b-md">
                    Bienvenido a la libreria de Juegos!
                </div>

                    <div class="reason reason1">
                        <h3> Tus catalogos en todo momento </h3>
                        <p> crea tus listas para juegos acorde a tus necesidades y 
                            accedelas desde donde quieras en todo momento</p>                
                    </div>
                    <div class="reason reason2">
                        <h3>Listas que se adaptan a tus necesidades</h3>
                        <p>Accede a tus listas con tan solo acceder a tu sesión 
                        y modificalas a tu gusto, siempre puedes agregar o quitar juegos de una lista
                        y el sistema relflejará los cambios en tiempo real</p>
                    </div>
                    <div class="reason reason3">
                        <h3>Una sociedad de listas</h3>
                        <p>Comparte tus listas con tan solo presionar un botón 
                        y deja que el mundo sepa sobre juegos que tal vez nunca hayan escuchado hablar</p>

                </div>
            </div>
        </div>
    @endsection