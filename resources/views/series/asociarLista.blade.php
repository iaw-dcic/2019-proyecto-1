@extends('generales.layout')

@section('pageTitle', 'Agregar Serie a lista')

@section('estilos')
    <link rel='stylesheet' href='/css/series/asociarLista.css'>
@stop

@section('body')

<div id="panelfondo">
    <h2>
        Agregar Serie a lista
    </h2>
    <form method="POST" action="/actualizarIdLista">
        {{csrf_field()}}
        <div>
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
            <button type="submit" class="botonAgregar">Guardar</button>
            <a href="/miPerfil/{{ Auth::user()->id}}"><button class="botonAgregar" type="button">Volver</button></a>
        </div>
    </form>  
</div>
@stop