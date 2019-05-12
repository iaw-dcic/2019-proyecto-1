
@extends('layouts.app')

<title>Galeria</title>
@section('content')
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
<link href="{{ asset('css/stylecss.css') }}" rel="stylesheet">
<link href="{{ asset('css/estilo.css') }}" rel="stylesheet">
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Email</th>
      <th scope="col">Peliteca</th>
    </tr>
  </thead>
  <tbody>
   @foreach ($users as $user)
    <tr>
      <td>{{$user->name}}</td>
      <td>{{$user->lastname}}</td>
      <td>{{$user->email}}</td>
      <td><a class="btn btn-primary" href="{{ url('/PelitecaShower',$user->id) }}"role="button">Obtener</a></td>
    </tr>
   @endforeach
  </tbody>
</table>
@endsection