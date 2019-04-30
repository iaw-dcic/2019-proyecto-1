@extends('generales.layout')

@section('pageTitle', 'Series')

@section('estilos')
    <link rel='stylesheet' href='css/index.css'>
    <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
@stop

@section('body')

    <!-- Pagina inicio -->
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" id="panelCarrusel">
            <div class="carousel-item active">
            <img src="/imgs/breakingbad.jpg" class="d-block w-100" id="imagenCarrusel" alt="...">
            </div>
            <div class="carousel-item">
            <img src="/imgs/hannibal.jpg" class="d-block w-100" id="imagenCarrusel" alt="...">
            </div>
            <div class="carousel-item">
            <img src="/imgs/got.jpeg" class="d-block w-100" id="imagenCarrusel" alt="...">
            </div>
            <div class="carousel-item">
            <img src="/imgs/strangers.jpg" class="d-block w-100" id="imagenCarrusel" alt="...">
            </div>
            <div class="carousel-item">
            <img src="/imgs/greys.jpg" class="d-block w-100" id="imagenCarrusel" alt="...">
            </div>
            <div class="carousel-item">
            <img src="/imgs/orphan.jpg" class="d-block w-100" id="imagenCarrusel" alt="...">
            </div>
            <div class="carousel-item">
            <img src="/imgs/vikingos.jpg" class="d-block w-100" id="imagenCarrusel" alt="...">
            </div>
            <div class="carousel-item">
            <img src="/imgs/blackmirror.jpg" class="d-block w-100" id="imagenCarrusel" alt="...">
            </div>
            <div class="carousel-item">
            <img src="/imgs/twd.jpg" class="d-block w-100" id="imagenCarrusel" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="panelInformacion">
         <h1 id="listasCompartidas">
            Listas Compartidas
        </h1>
        <div class="container">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Usuario</th>
                </tr>
            </thead>
            <tbody>
                 @foreach($lista as $listas)
                <tr>
                    <td>{{ $listas->nombre_lista}}</td>
                    <td>{{ $listas->usuario->name}}</td>
                @endforeach
                </tr>
            </tbody>
        </table>
    </div>
@stop