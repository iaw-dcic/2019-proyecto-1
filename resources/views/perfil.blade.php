@extends('layouts.app')


@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Perfil</h1>
  </div>
</div>
<div class="container">
  <form method="POST" action="/home/perfil">
  {{csrf_field()}}
    <div class="form-group">
      <h4 for="formGroupExampleInput">Nombre y apellido: </h4>
      <h6>{{ auth()->user()->name }}</h6>
      <input type="text" class="form-control" id="formGroupExampleInput" name="name" placeholder="...">
    </div>
    <div class="form-group">
      <h4 for="formGroupExampleInput">Email </h4>
      <h6>{{ auth()->user()->email }}</h6>
    </div>
    <div class="form-group">
      <h4 for="formGroupExampleInput2">Ciudad</h4>
      <h6>{{ auth()->user()->ciudad}}</h6>
      <input type="text" class="form-control" id="formGroupExampleInput2" name="city" placeholder="...">
    </div>
    <div class="form-group">
      <h4 for="formGroupExampleInput2">Bio</h4>
      <h6>{{ auth()->user()->bio }}</h6>
      <input type="text" class="form-control" id="formGroupExampleInput2" name="bio" placeholder="...">
    </div>
    <button type="submit" class="btn btn-primary">
    <i class="fa fa-btn fa-sign-in"></i>Actualizar
  </button>
  </form>
</div>



@endsection