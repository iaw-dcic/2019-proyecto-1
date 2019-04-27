@extends('layout.appContent')

@section('titulo')
  Ver Lista
@endsection

@section('content')

<ul class="list-group">
  <li class="list-group-item">{{__('Nombre de la Lista: {{$lista->titulo}}')}}</li>
  <li class="list-group-item">{{__('Descripción de la Lista: {{$lista->descripcion}}')}}</li>
  <li class="list-group-item list">{{__('Juegos:')}}</li>
  <div>
    <ul class= "list-group">
    @foreach($juego as $lista->juegos)
        <li class="list-group-item"> <a href="/games/{{$game->id}}" class="list-group-item list-group-item-action">{{$juego->nombre}}</a> </li>
    @endforeach
    </ul>
  </div>
</ul>
<div class="btn-group" role="group" aria-label="list options">
    <a href="/games/crear" class="btn btn-outline-info">Agregar Juego</button>
    <a href="profiles/{{$profile->id}}/lists/{{$list->id}}/editar" class="btn btn-outline-info">Editar datos Lista</button>
</div>

<a href="/profile/{{$profile->id}}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Volver al Perfil</a>
@endsection