@extends('layouts.app')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

@section('content')

@php
    $user = DB::table('users')->where('id', $id)->first();
@endphp
@if($user!=null)
<div class="container">
    <form>
    <p class="h3">{{$user->name}}</p>
@auth
    @if (Auth::user()->id==$id)
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value={{$user->email}}>
    </div>
  </div>
  <div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">Edad</label>
  <div class="col-xs-2">
    <input type="text" class="form-control" id="edad" value="Edad">
    </div>
  </div>
  <div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">Nacionalidad</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value=Argentino>
    </div>
  </div>
  <div class="form-group row">
  <label for="staticEmail" class="col-sm-2 col-form-label">Sexo</label>
  <div class="row">
      <select id="combobox" class="form-control">
        <option value="P">Prefiero no decirlo</option>
        <option value="F">Femenino</option>
        <option value="M">Masculino</option>
      </select>
  </div>
  </div>
</form>
</div>
    @else
    <br><label class="col-md-4 col-form-label text-md-right">Estas en el perfil de {{$user->name}} y ademas estas logueado</label></br>
    @endif
 @else
    No estas logueado
 @endauth
 @else
    Error 404: Usuario inexistente.
@endif
@endsection
