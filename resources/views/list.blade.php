@extends('layouts.app')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

@section('content')

<div class="container">
<div class="row justify-content-center">
<div class="col-sm-6">
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
        </div>
    </form>
    <form method="GET" action="/list/{{$lista->id}}/car/create">
    <button type="submit" class="btn btn-primary">Agregar auto</button>
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
      <th scope="col">Versión</th>
      @auth
            @if (Auth::user()->id==$lista->user_id)
                <th scope="col"></th>
            @endif
        @endauth
    </tr>
  </thead>
  <tbody>
    @foreach($lista->cars as $car)
    <tr>
      <th>{{$car->brand}}</th>
      <td>{{$car->model}}</td>
      <td>{{$car->version}}</td>
      @auth
            @if (Auth::user()->id==$lista->user_id)
            <td>
            <div class="row">
            <form method="GET" action="/list/{{$lista->id}}/car/{{$car->id}}/edit">
                <button type="submit" class="btn btn-success">Editar</button>
            </form>
            <form method="POST" action="/list/{{$lista->id}}/car/{{$car->id}}/edit">
                {{method_field('DELETE')}}
                {{csrf_field()}}
                <button type="submit" class="btn btn-danger">Borrar</button>
            </form>
            </div>
            </td>
            @endif
        @endauth
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