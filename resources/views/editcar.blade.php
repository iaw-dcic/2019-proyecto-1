@extends('layouts.app')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

@section('content')

<div class="container">
<div class="row justify-content-center">
<div class="col-sm-6">
<div class="card">
<div class="card-header">Editar auto</div>
<div class="card-body">
<form method="POST" action="/list/{{$car->lista_id}}/car/{{$car->id}}/update">
    {{method_field('PATCH')}}
    {{csrf_field()}}
  <div class="form-group">
    <label for="brand">Marca</label>
    <input type="text" class="form-control" name="brand" placeholder="Marca" value={{$car->brand}} required>
    <label for="model">Modelo</label>
    <input type="text" class="form-control" name="model" placeholder="Modelo" value={{$car->model}} required>
    <label for="version">Versión</label>
    <input type="text" class="form-control" name="version" placeholder="Versión" value={{$car->version}} required>
  </div>
  <button type="submit" class="btn btn-primary">Editar</button>
</form>
</div>
</div>
</div>
</div>
</div>

@endsection