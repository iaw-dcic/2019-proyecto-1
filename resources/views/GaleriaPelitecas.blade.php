
@extends('layouts.app')

<title>Galeria</title>
@section('content')
 
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Email</th>
      <th scope="col">Peliteca</th>
    </tr>
  </thead>
  <tbody>
   @foreach ($users as $user)
    <tr>
      <td>{{$user->id}}</td>
      <td>{{$user->name}}</td>
      <td>{{$user->lastname}}</td>
      <td>{{$user->email}}</td>
      <td><a class="btn btn-primary" href="{{ url('/Peliteca',$user->id) }}"role="button">Obtener</a></td>
    </tr>
   @endforeach
  </tbody>
</table>
@endsection