@extends('layout')

@section('title', 'Lista actuales de peliculas')

@section('content')

 <h1>{{ $title }}</h1>

 <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Lista</th>
      <th scope="col">Creada por</th>
      <th scope="col">Fecha</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mis peliculas favoritas</td>
      <td >Otto</td>
      <td>22/02/2008</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Las peliculas que mas odio</td>
      <td>Thornton</td>
      <td>22/02/2019</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Mis peliculas de comedia favoritas</td>
      <td>the Bird</td>
      <td>5/08/2018</td>
    </tr>
  </tbody>
</table>
@endsection
