@extends('layouts.app')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

@section('content')

<div class="container">
<div class="col-md-4 col-md-offset-4">
<h1>Crear lista</h1>
<form method="POST" action="/list/create">
    {{csrf_field()}}
  <div class="form-group">
    <label for="nombre">Nombre de la lista</label>
    <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" name="compartir">
    <label class="form-check-label" for="compartir">Compartir lista</label>
  </div>
  <button type="submit" class="btn btn-primary">Crear</button>
</form>
</div>
</div>



@endsection