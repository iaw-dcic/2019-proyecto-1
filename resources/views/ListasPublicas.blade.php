
@extends('layouts.app')


@section('content')
 
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Email</th>
      <th scope="col">Coleccion</th>
    </tr>
  </thead>
  <tbody>
   
   @foreach ($users as $user)
    <tr>
      <td>{{$user->id}}</td>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td><a class="btn btn-outline-danger" href="{{ url('/Coleccion',$user->id) }}"role="button">Obtener</a></td>
    </tr>
     @endforeach
  </tbody>
</table>
@endsection