@extends('layouts.app')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

@section('title')
  Agregar auto
@endsection

@section('content')

<div class="container">
<div class="row justify-content-center">
<div class="col-sm-6">
<div class="card">
<div class="card-header">Añadir auto</div>
<div class="card-body">
<form method="POST" action="/list/{{$id}}/car/create">
    {{csrf_field()}}
  <div class="form-group">
    <label for="brand">Marca</label>
    <input type="text" class="form-control" name="brand" placeholder="Marca" required>
    <label for="model">Modelo</label>
    <input type="text" class="form-control" name="model" placeholder="Modelo" required>
    <label for="version">Versión</label>
    <input type="text" class="form-control" name="version" placeholder="Versión" required>
  </div>
  <button type="submit" class="btn btn-primary">Añadir</button>
</form>
</div>
</div>
</div>
</div>
</div>



@endsection