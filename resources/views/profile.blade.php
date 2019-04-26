@extends('layouts.app')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

@section('content')

<div class="container">
<div class="row justify-content-center">
<div class="col-sm-6">
<div class="card">
<div class="card-header">{{$user->name}}</div>
<div class="card-body">
<form method="POST" action="/list/create">
    {{csrf_field()}}
  <div class="form-group">
    <label for="nombre">Nombre de usuario</label>
    <input type="text" class="form-control" name="nombre" placeholder="Nombre" value={{$user->name}} required>
  </div>
  <div class="form-group">
  <label for="edad">Edad</label>
    <input type="text" class="form-control" name="edad" placeholder="Edad" required>
  </div>
  <div class="form-group">
  <label for="pais">País</label>
    <input type="text" class="form-control" name="pais" placeholder="País" required>
  </div>
  <div class="form-group">
  <label for="state">Provincia/Estado</label>
    <input type="text" class="form-control" name="state" placeholder="Provincia/Estado" required>
  </div>
  <div class="form-group">
  <label for="city">Ciudad</label>
    <input type="text" class="form-control" name="city" placeholder="Ciudad" required>
  </div>
  <button type="submit" class="btn btn-primary">Editar</button>
</form>
</div>
</div>
</div>
</div>
</div>


@endsection
