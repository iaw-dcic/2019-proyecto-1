@extends('layouts.appContent')

@section('extraStyles')
<link href="https://fonts.googleapis.com/css?family=Gugi|Poppins" rel="stylesheet">
<link href="{{ asset('css/infoJuego.css') }}" rel="stylesheet">
@endsection


@section('content')
<div class="page-header text-center tituloJuego">
  <h1>{{$datosJuego[0]->name}} <small>datos</small></h1>
</div>

<div class="panel panel-primary datos">
    <p class="text-center"> genero: {{$datosJuego[0]->genre}} </p>
    <p class="text-center">  compañia: {{$datosJuego[0]->company}} </p>
    <p class="text-center"> fecha de salida: {{$datosJuego[0]->release_date}} </p>
    <p class="text-center"> Creador del juego: {{$nombreUs}} </p>
</div>
@if(Auth::user()->id == $idUsuario)
  <div>
  <a href="/lists/{{$idLista}}" class="btn btn-info btn-lg btn-block">Volver a la lista</a>
  </div>
@else
<div>
  <a href="/listaAjena/{{$nombreUs}}/{{$idLista}}" class="btn btn-info btn-lg btn-block">Volver a la lista ajena</a>
  </div>
@endif


@endsection