@extends('layouts.appContent')

@section('titulo')
    Perfil de {{$user->name}}
@endsection

@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">buenas {{$user->name}}</h1>
    <p class="lead">Bienvenido a tu página de usuario, desde aquí podrás consultar tus listas y juegos</p>
  </div>
</div>

<div class="btn-toolbar" role="toolbar" aria-label="user Toolbar" >
  <div class="btn-group mr-2" role="group" aria-label="user Actions">
    <a class="btn btn-secondary" href="/profiles/{{'$user->name'}}/editar" role="button">editar Datos de Usuario</a>

    <form method="POST" action="/">
      @method('DELETE')
      @csrf
      <button type="submit" class="btn btn-secondary" >Eliminar Usuario </button>
    </form>
    <a class="btn btn-secondary" href="/lists" role="button">ver Listas</a>
    <a class="btn btn-secondary" href="/games" role="button">ver Juegos</a>
  </div>
@endsection