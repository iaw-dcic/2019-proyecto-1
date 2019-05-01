@extends('generales.layout')

@section('pageTitle', 'Crear Lista')

@section('estilos')
    <link rel='stylesheet' href='/css/listas/createLista.css'>
@stop

@section('body')

<div id= "panelfondo">
    <div class="card-header">Crear Lista</div>
        <div class="card-body">
            <!-- Contenido de la vista agregar -->
            <form method="POST" action="{{ route('listas.store') }}">
                {{csrf_field()}}

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="nombre_lista">Nombre</label>
                        <input type="text" class="form-control" name="nombre_lista" placeholder="Series Ciencia Ficcion" required value="{{old ('nombre_lista')}}">
                    </div>

                    <div class="form-group col-md-12">
                        <label for="publica">¿Desea que sea Publica?</label>
                        <br>
                        <input type="radio" name="publica"value="Si">Si
                        <br>
                        <input type="radio" name="publica" value="No" checked>No
                    </div>
                </div>

                <input type="hidden" name="id_usuario" value="{{ Auth::user()->id }}">

                <div id= "panelBoton">
                    <button type="submit" class="botonGuardar">Guardar</button>
                    <a href="/miPerfil/{{ Auth::user()->id}}"><button class="botonGuardar" type="button">Volver</button></a>
                </div>
            </form>
        </div>
</div>

@stop