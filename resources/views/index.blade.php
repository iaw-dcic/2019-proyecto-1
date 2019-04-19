@extends('layout')

@section('pageTitle', 'Series')

@section('estilos')
    <link rel='stylesheet' href='css/estilosIndex.css'>
@stop

@section('body')

    <!-- aca metes todo lo que quieras de la pagina inicio -->
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
 
    <!--PANEL DE LAS SERIES COMPARTIDAS POR LOS USUARIOS-->
    <div id= "panelCompartido">
        <div>
            <h1 id="tituloPrincipal">Series Compartidas</h1>
        </div>
    </div>

    <div id="panelDescripcion">
        <a class="botonABM" type="button" href="/agregar">Agregar serie</a>
        <a class="botonABM" type="button" href="/editar">Editar serie</a>
        <a class="botonABM" type="button" href="/eliminar">Eliminar serie</a>
    </div>
@stop