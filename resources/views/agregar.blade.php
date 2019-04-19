@extends('layout')

@section('pageTitle', 'Agregar Serie')

@section('estilos')
    <link rel='stylesheet' href='css/estilosAgregar.css'>
@stop

@section('body')

    <!-- Contenido de la vista agregar -->
    <form>
    <div id= "panelFondo">
        <div class="form-row">
            <div class="nombre col-md-5">
                <label for="inputEmail4">Nombre</label>
                <input type="text" class="form-control" id="inputEmail4" placeholder="Game of Thrones">
            </div>
            <div class="temporadas col-md-5">
                <label for="inputAddress2">Temporadas</label>
                <input type="text" class="form-control" id="inputAddress2" placeholder="8 Temporadas">
             </div>
        </div>
        <div class="puntuacion col-md-6">
            <label for="inputAddress">Puntuacion</label>
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
            <div class="comentarios col-md-10">
                <label for="inputCity">Comentarios</label>
                <input type="text" class="form-control" id="inputCity">
            </div>
        </div>
        
        <div id= "panelBoton">
          <button type="submit" class="botonAgregar"> Guardar </button>
        </div>
    </div>
    </form>
@stop