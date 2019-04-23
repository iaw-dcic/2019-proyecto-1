@extends('layouts.app')


@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Perfil</h1>
  </div>
</div>
<div class="container">
  <form method="POST" action="/home/perfil">
    <div class="form-group">
      <h4 for="formGroupExampleInput">Nombre y apellido: </h4>
      <input type="text" class="form-control" id="formGroupExampleInput" placeholder="{{ auth()->user()->name }}">
    </div>
    <div class="form-group">
      <h4 for="formGroupExampleInput">Email </h4>
      <input type="text" class="form-control" id="formGroupExampleInput" placeholder="{{ auth()->user()->email }}">
    </div>
    <div class="form-group">
      <h4 for="formGroupExampleInput2">Ciudad</h4>
      <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="{{ auth()->user()->ciudad }}">
    </div>
    <div class="form-group">
      <h4 for="formGroupExampleInput2">Bio</h4>
      <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="{{ auth()->user()->bio }}">
    </div>
    <button type="button" class="btn btn-link">Actualizar</button>
  </form>
</div>



@endsection