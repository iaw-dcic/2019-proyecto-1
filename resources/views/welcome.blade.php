@extends('layouts.app')

@section('content')

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Colecciones de libros</h1>
    <p class="lead">IAW - 2019</p>
  </div>
</div>


<div class="album py-5">
  <div class="container">
    <div class="row">

      <table class="table">
        <thead class="thead">
          <tr>
            <th scope="col">Titulo</th>
            <th scope="col">Usuario</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>

          @foreach ($collec as $colec)
          <tr>
            <th scope="row">{{$colec->title}}</th>
            <td><a href="/welcome/profile/{{$colec->user->id}}"> {{$colec->user->name}}</a></td>
            <td><a href="/welcome/loadbook/{{$colec->id}}"> Ver</a></td>
          </tr>
          @endforeach

        </tbody>
      </table>

    </div>
  </div>
</div>
@endsection