@extends('generales.layout')

@section('pageTitle', 'Agregar Serie')

@section('estilos')
    <link rel='stylesheet' href='/css/series/create.css'>
@stop

@section('body')

<div id= "panelFondo">
    <div class="card-header">Agregar Serie</div>
        <div class="card-body">
            <!-- Contenido de la vista agregar -->
            <form method="POST" action="{{ route('serie.store') }}">
            {{csrf_field()}}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Game of Thrones" required value="{{old ('nombre')}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="temporadas">Temporadas</label>
                        <input type="number" class="form-control" name="temporadas" placeholder="8" required value="{{old ('temporadas')}}" min="1">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="puntuacion">Puntuacion</label>
                        <br>
                        <input type="radio" name="puntuacion" value="Malo">Malo
                        <br>
                        <input type="radio" name="puntuacion" value="Bueno" checked>Bueno
                        <br>
                        <input type="radio" name="puntuacion" value="Muy Bueno">Muy Bueno
                        <br>
                        <input type="radio" name="puntuacion" value="Excelente">Excelente
                    </div>
                </div>
            
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="comentarios">Comentarios</label>
                        <input type="text" class="form-control" name="comentarios" required value="{{old ('comentarios')}}">
                    </div>
                </div>

                <input type="hidden" name="id_usuario" value="{{ Auth::user()->id }}">
                
                <div id= "panelBoton">
                    <button type="submit" class="botonAgregar">Guardar</button>
                    <a href="/miPerfil/{{ Auth::user()->id}}"><button class="botonAgregar" type="button">Volver</button></a>
                </div>
            </form>
        </div>
    </div>
</div>

@stop