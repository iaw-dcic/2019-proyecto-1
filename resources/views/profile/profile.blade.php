@extends('layouts.app')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

@section('title')
{{$user->name}}
@endsection


@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-sm-6">
      <div class="card">
        <div class="card-header">{{$user->name}}</div>
        <div class="card-body">
          @auth
          @if (Auth::user()->id==$user->id)
          <form method="POST" action="/profile/{{$user->id}}">
            {{method_field('PATCH')}}
            {{csrf_field()}}
            <div class="form-group">
              <label for="nombre">Nombre de usuario</label>
              <input type="text" class="form-control" name="nombre" placeholder="Nombre" value={{$user->name}} required>
            </div>
            <div class="form-group">
              <label for="edad">Edad</label>
              <input type="text" class="form-control" name="edad" placeholder="Edad" numeric value=@if ($dato->age!='0')
              {{$dato->age}}
              @endif
              >
            </div>
            <div class="form-group">
              <label for="pais">País</label>
              <input type="text" class="form-control" name="pais" placeholder="País" value=@if ($dato->country!='')
              {{$dato->country}}
              @endif
              >
            </div>
            <div class="form-group">
              <label for="state">Provincia/Estado</label>
              <input type="text" class="form-control" name="state" placeholder="Provincia/Estado" value=@if ($dato->state!='')
              {{$dato->state}}
              @endif
              >
            </div>
            <div class="form-group">
              <label for="city">Ciudad</label>
              <input type="text" class="form-control" name="city" placeholder="Ciudad" value=@if ($dato->city!='')
              {{$dato->city}}
              @endif
              >
            </div>
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
          </form>
          <form method="GET" action="/profile/{{$user->id}}/lists">
            <button type="submit" class="btn btn-primary">Ver listas</button>
          </form>
          @else
          <div class="form-group">
            <label for="edad">
              @if ($dato->age!='0')
              Edad: {{$dato->age}}
              @else
              Edad: -
              @endif
            </label>
          </div>
          <div class="form-group">
            <label for="pais">
              @if ($dato->country!='')
              País: {{$dato->country}}
              @else
              País: -
              @endif
            </label>
          </div>
          <div class="form-group">
            <label for="state">
              @if ($dato->state!='')
              Provincia/Estado: {{$dato->state}}
              @else
              Provincia/Estado: -
              @endif
            </label>
          </div>
          <div class="form-group">
            <label for="city">
              @if ($dato->city!='')
              Ciudad: {{$dato->city}}
              @else
              Ciudad: -
              @endif
            </label>
          </div>
          <form method="GET" action="/profile/{{$user->id}}/lists">
            <button type="submit" class="btn btn-primary">Ver listas</button>
          </form>
          @endif
          @else
          <div class="form-group">
            <label for="edad">
              @if ($dato->age!='0')
              Edad: {{$dato->age}}
              @else
              Edad: -
              @endif
            </label>
          </div>
          <div class="form-group">
            <label for="pais">
              @if ($dato->country!='')
              País: {{$dato->country}}
              @else
              País: -
              @endif
            </label>
          </div>
          <div class="form-group">
            <label for="state">
              @if ($dato->state!='')
              Provincia/Estado: {{$dato->state}}
              @else
              Provincia/Estado: -
              @endif
            </label>
          </div>
          <div class="form-group">
            <label for="city">
              @if ($dato->city!='')
              Ciudad: {{$dato->city}}
              @else
              Ciudad: -
              @endif
            </label>
          </div>
          <form method="GET" action="/profile/{{$user->id}}/lists">
            <button type="submit" class="btn btn-primary">Ver listas</button>
          </form>
          @endauth
        </div>
      </div>
    </div>
  </div>
</div>


@endsection