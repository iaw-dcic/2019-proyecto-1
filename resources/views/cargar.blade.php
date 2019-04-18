@extends('layouts.app')

@section('content')
<form method="POST" action="/welcome">
{{csrf_field()}}
  <div class="form-group">
    <label for="title">Titulo del libro</label>
    <input type="text" class="form-control" name="title" placeholder="Titulo">
  </div>

  <div class="form-group">
    <label for="category">Categoria</label>
    <input type="text" class="form-control" name="category" placeholder="Categoria">
  </div>

  <div class="form-group">
    <label for="description">Descripcion</label>
    <textarea class="form-control" name="description" rows="3"></textarea>
  </div>

  <div class="form-group">
    <label for="exampleFormControlFile1">Subir archivo</label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1">
  </div>

  <div>
      <button type="submit"> Cargar</button>
  </div>
</form>
@endsection