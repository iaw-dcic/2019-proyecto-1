@extends('layouts.appContent')

@section('titulo')
    Perfil de {{$user->name}}
@endsection

@section('extraStyles')
<link href="{{ asset('css/profileStyle.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="jumbotron jumbotron-fluid welcome_info">
  <div class="container">
    <h1 class="display-4">buenas {{$user->name}}</h1>
    <p class="lead">Bienvenido a tu página de usuario, desde aquí podrás consultar tus listas y juegos</p>
  </div>
</div>

<div class="btn-toolbar action_buttons" role="toolbar" aria-label="user Toolbar" >
  <div class="btn-group mr-2" role="group" aria-label="user Actions">
    <a class="btn btn-secondary btn-lg" href="/profiles/{{'$user->id'}}/editar" role="button">editar Datos de Usuario</a>

    <form method="POST" action="/">
      @method('DELETE')
      @csrf
      <button type="submit" class="btn btn-secondary btn-lg" >Eliminar Usuario </button>
    </form>
    <a class="btn btn-secondary btn-lg" href="/lists" role="button">ver Listas</a>
    <a class="btn btn-secondary btn-lg" href="/games" role="button">ver Juegos</a>
  </div>
</div>

<div>
  @foreach()
</div>
@endsection