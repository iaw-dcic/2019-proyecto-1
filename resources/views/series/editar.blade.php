@extends('generales.layout')

@section('pageTitle', 'Editar Serie')

@section('estilos')
    <link rel='stylesheet' href='/css/series/editar.css'>
@stop

@section('body')

<div id= "panelFondo">
    <div class="card-header">Editar Serie</div>
        <div class="card-body">
            <!-- Contenido de la vista editar -->
            <form action="{{ route('serie.update', $serie->id) }}" method="POST">
                {{csrf_field()}}
                @method('PUT')
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" value="{{ $serie-> nombre }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="temporadas">Temporadas</label>
                        <input type="number" class="form-control" name="temporadas" value="{{ $serie-> temporadas }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="puntuacion">Puntuacion</label>
                        <br>
                        @if ($serie->puntuacion=="Malo")
                            <input type="radio" name="puntuacion" value="Malo" checked>Malo
                            <br>
                            <input type="radio" name="puntuacion" value="Bueno">Bueno
                            <br>
                            <input type="radio" name="puntuacion" value="Muy Bueno">Muy Bueno
                            <br>
                            <input type="radio" name="puntuacion" value="Excelente">Excelente
                        @elseif ($serie->puntuacion=="Bueno")
                            <input type="radio" name="puntuacion" value="Malo">Malo
                            <br>
                            <input type="radio" name="puntuacion" value="Bueno" checked>Bueno
                            <br>
                            <input type="radio" name="puntuacion" value="Muy Bueno">Muy Bueno
                            <br>
                            <input type="radio" name="puntuacion" value="Excelente">Excelente
                        @elseif ($serie->puntuacion=="Muy Bueno")
                            <input type="radio" name="puntuacion" value="Malo">Malo
                            <br>
                            <input type="radio" name="puntuacion" value="Bueno">Bueno
                            <br>
                            <input type="radio" name="puntuacion" value="Muy Bueno" checked>Muy Bueno
                            <br>
                            <input type="radio" name="puntuacion" value="Excelente">Excelente
                        @elseif($serie->puntuacion=="Excelente")
                            <input type="radio" name="puntuacion" value="Malo">Malo
                            <br>
                            <input type="radio" name="puntuacion" value="Bueno">Bueno
                            <br>
                            <input type="radio" name="puntuacion" value="Muy Bueno">Muy Bueno
                            <br>
                            <input type="radio" name="puntuacion" value="Excelente" checked>Excelente
                        @endif
                    </div>
                </div>
            
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="comentarios">Comentarios</label>
                        <input type="text" class="form-control" name="comentarios" value="{{ $serie-> comentarios }}">
                    </div>
                </div>
                
                <div id= "panelBoton">
                    <button type="submit" class="botonEditar">Editar Serie</button>
                    <a href="/miPerfil/{{ Auth::user()->id}}"><button class="botonEditar" type="button">Volver</button></a>
                </div>

                <input type="hidden" name="id_usuario" value="{{ Auth::user()->id}}">
            </form>
        </div>
</div>    

@stop