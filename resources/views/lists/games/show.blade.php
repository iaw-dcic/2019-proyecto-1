@extends('layouts.appContent')

@section('titulo')
  datos del jeugo 
@endsection

@section('extraStyles')
<link href="https://fonts.googleapis.com/css?family=Gugi|Poppins" rel="stylesheet">
<link href="{{ asset('css/infoJuego.css') }}" rel="stylesheet">
@endsection


@section('content')
<div class="page-header text-center tituloJuego">
  <h1>Datos de {{$datosJuego[0]->name}}</h1>
</div>

<div class="panel panel-primary datos">
    <p class="text-center"> genero: {{$datosJuego[0]->genre}} </p>
    <p class="text-center">  compañia: {{$datosJuego[0]->company}} </p>
    <p class="text-center"> fecha de salida: {{$datosJuego[0]->release_date}} </p>
    <p class="text-center"> Creador del juego: {{$nombreUs}} </p>
</div>


@if(Auth::user()->id == $idUsuario)
  <div class="row">
    <div class="col-md-12 text-center action_buttons">
      <div class="btn-toolbar action_buttons text-center" role="toolbar" aria-label="game Toolbar" >
        <div class="btn-group mr-2 action_buttons text-center" role="group" aria-label="game Actions">
          <a href="/lists/{{$idLista}}" class="btn btn-info btn-lg">Volver a la lista</a>
          <a href="{{route('gameEdit',[ $datosJuego[0]->id, $idLista  ])}}" class="btn btn-info btn-lg"> editar Datos de {{$datosJuego[0]->name}}</a>
        </div>
      </div>
    </div>
  </div>
@else
<div>
  <a href="/listaAjena/{{$nombreUs}}/{{$idLista}} text-center" class="btn btn-info btn-lg btn-block">Volver a la lista ajena</a>
</div>
@endif


@endsection