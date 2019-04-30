@extends('generales.layout')

@section('pageTitle', 'Agregar Serie a lista')

@section('estilos')
    <link rel='stylesheet' href='/css/listas/createLista.css'>
@stop

@section('body')

<div id= "panelfondo">
    <div class="card-header">Agregar Serie a {{$lista->nombre_lista}}</div>
         <form method="POST" action="/actualizarIdLista/{{$serie->id}}">
            {{csrf_field()}}
            <div class="card-body">
                @foreach($serie as $seriesListar)
                    @if (is_null ($seriesListar->id_lista))
                        <input type="checkbox" name="serieListada" value="1">{{$seriesListar->nombre}}
                        <br>
                    @elseif ($seriesListar->id_lista==$lista->id)
                        <input type="checkbox" name="serieListada" value="1" checked>{{$seriesListar->nombre}}
                        <br>
                    @endif
                @endforeach
            </div>
    


            <div id= "panelBoton">
                <button type="submit" class="botonGuardar">Guardar</button>
                <a href="{{ url('/') }}/miPerfil/{{ Auth::user()->id}}"><button class="botonGuardar" type="button">Volver</button></a>
            </div>
        </form>
    </div>   
</div>
@stop