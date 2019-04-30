@extends('generales.layout')

@section('pageTitle', 'Agregar Serie a lista')

@section('estilos')
    <link rel='stylesheet' href='/css/series/asociarLista.css'>
@stop

@section('body')

<div id= "panelfondo">
    <div class="card-header">Agregar Serie a lista</div>
         <form method="POST" action="/actualizarIdLista">
            {{csrf_field()}}
            <div class="card-body">
                @foreach($lista as $listas)
                    @if ($serie->id_lista == $listas->id)
                        <input type="radio" name="idLista" value="{{$listas->id}}" checked>{{$listas->nombre_lista}}
                        <br>
                    @else
                        <input type="radio" name="idLista" value="{{$listas->id}}">{{$listas->nombre_lista}}
                        <br>
                    @endif
                @endforeach
            </div>

            <input type="hidden" name="id_serie" value="{{ $serie->id }}">
    
            <div id= "panelBoton">
                <button type="submit" class="botonGuardar">Guardar</button>
                <a href="/miPerfil/{{ Auth::user()->id}}"><button class="botonGuardar" type="button">Volver</button></a>
            </div>
        </form>
    </div>   
</div>
@stop