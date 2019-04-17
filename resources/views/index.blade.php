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
            <img src="/imgs/series.png" class="d-block w-100" id="imagenCarrusel" alt="...">
            </div>
            <div class="carousel-item">
            <img src="/imgs/images.jpg" class="d-block w-100" id="imagenCarrusel" alt="...">
            </div>
            <div class="carousel-item">
            <img src="/imgs/descarga.jpg" class="d-block w-100" id="imagenCarrusel" alt="...">
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

    <div id="panelDescripcion">
        <a class="botonABM" type="button" href="/agregar">Agregar serie</a>
        <a class="botonABM" type="button" href="/editar">Editar serie</a>
        <a class="botonABM" type="button" href="/eliminar">Eliminar serie</a>
    </div>
@stop