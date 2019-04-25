@extends('layouts.app')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

@section('content')

<div class="container">
<div class="row justify-content-center">
<div class="col-md-8">
@auth
@if (Auth::user()->id==$lista->user_id)
<form method="POST" action="/list/{{$lista->id}}">
    {{method_field('PATCH')}}
    {{csrf_field()}}
    <div class="form">
    <div class="form-group">
        <label for="nombre">Nombre de la lista</label>
        <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="{{$lista->name}}" required>
    </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" name="compartir"
            @if($lista->share=='1')
                checked
            @endif
            >
            <label class="form-check-label" for="compartir">Visible</label>
        </div>
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
        <button type="button" class="btn btn-primary" onclick="window.location='{{ route('profile', Auth::user()->id) }}'">Agregar</button>
    </div>
  </form>
  @else
    <h2>{{$lista->name}}</h2>
  @endif
  @else
    <h2>{{$lista->name}}</h2>
    @endauth
<div class="card">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Marca</th>
      <th scope="col">Modelo</th>
      <th scope="col">Version</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach($lista->cars as $car)
    <tr>
      <th>{{$car->brand}}</th>
      <td>{{$car->model}}</td>
      <td>{{$car->version}}</td>
      <td><button type="button" class="btn btn-success" onclick="window.location='{{ route('profile', Auth::user()->id) }}'">Editar</button>
      <button type="button" class="btn btn-danger" onclick="window.location='{{ route('profile', Auth::user()->id) }}'">Borrar</button></td>
    @endforeach
  </tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>



@endsection