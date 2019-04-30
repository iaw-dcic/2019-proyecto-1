@extends('layouts.appContent')

@section('titulo')
    Perfil de {{$name}}
@endsection

@section('extraStyles')
<link href="{{ asset('css/profileStyle.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="jumbotron jumbotron-fluid welcome_info">
  <div class="container">
  @if(Auth::user()->name == $name)

    <h1 class="display-4">Bienvenido {{$name}} {{$surname}}</h1>
    <p class="lead">Bienvenido a tu página de usuario, desde aquí podrás consultar tus listas y juegos</p>
    <p> tu e-mail es: {{Auth::user()->email}}</p>
    
  @else
  <h1 class="display-4">Estas viendo el perfil de {{$name}}</h1>
    <p class="lead">Bienvenido al perfil de {{$name}}, aquí podrás consultar las listas públicas que este usuario creó</p>
  @endif
  </div>
</div>

<div class="row">
  <div class="col-md-12 text-center action_buttons">
    <div class="btn-toolbar action_buttons" role="toolbar" aria-label="user Toolbar" >
      <div class="btn-group mr-2 action_buttons" role="group" aria-label="user Actions">
        @if(Auth::user()->name == $name)
          <a class="btn btn-secondary btn-lg" href="/profiles/{{Auth::user()->name}}/editar" role="button">editar Datos de Usuario</a>

          <form method="POST" action="/profiles/{{Auth::user()->name}}">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-secondary btn-lg" >Eliminar Usuario </button>
          </form>
          <a class="btn btn-secondary btn-lg" href="/lists" role="button">ver Listas</a>
        @else
          <a class="btn btn-secondary btn-lg" href="{{route('ListaAjena', $idActual)}}" role="button">ver Listas</a>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection