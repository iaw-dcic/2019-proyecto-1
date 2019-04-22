@extends('layout')

@section('pageTitle', 'Editar Serie')

@section('estilos')
    <link rel='stylesheet' href='css/editar.css'>
@stop

@section('body')

    <div id= "panelFondo">
        <!-- Contenido de la vista agregar -->
        <form method="POST" action="editar/{{$series->id}}">
            {{csrf_field()}}
            @method('PUT')
            
            <div id= "panelFondo">
                <!-- Contenido de la vista agregar -->
                <div class="card-header">Actualizar datos</div>
                <div class="card-body">
                    <form method="POST" action="agregar">
                        {{csrf_field()}}
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" name="nombre" placeholder="Game of Thrones" required value="{{ $series->nombre}}" >
                            </div>
                            <div class="form-group col-md-5">
                                <label for="temporadas">Temporadas</label>
                                <input type="number" class="form-control" name="temporadas" placeholder="8" required value="{{$series->temporadas}}" min="1" max="100">
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="puntuacion">Puntuacion</label>
                            <p class="clasificacion">
                                <input id="radio1" type="radio" name="estrellas" value="5">
                                <label for="radio1">★</label>
                                <input id="radio2" type="radio" name="estrellas" value="4">
                                <label for="radio2">★</label>
                                <input id="radio3" type="radio" name="estrellas" value="3">
                                <label for="radio3">★</label>
                                <input id="radio4" type="radio" name="estrellas" value="2">
                                <label for="radio4">★</label>
                                <input id="radio5" type="radio" name="estrellas" value="1">
                                <label for="radio5">★</label>
                            </p>
                        </div>
                    
                        <div class="form-row">
                            <div class="form-group col-md-10">
                                <label for="comentarios">Comentarios</label>
                                <input type="text" class="form-control" name="comentarios" required value="{{$series->comentarios}}">
                            </div>
                        </div>
                            
                        <div id= "panelBoton">
                            <button type="submit" class="botonAgregar">Guardar</button>
                        </div>
                    </form>
                </div>
            </form>
        </div>
    </div>

@stop