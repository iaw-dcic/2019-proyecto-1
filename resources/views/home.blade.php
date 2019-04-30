@extends('layouts.app')


@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Mis colecciones de libros</h1>
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
            <th scope="col">Categoria</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Publica/Privada</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>

          @foreach ($collec as $colec)
          <tr>
            <th scope="row">{{$colec->title}}</th>
            <td>{{$colec->category}}</td>
            <td>{{$colec->description}}</td>

            @if ($colec->pp === 1)
            <td>Publica</td>
            @else
            <td>Privada</td>
            @endif

            <td><a href="/home/loadBooks/{{$colec->id}}"> Ver</a></td>
          </tr>
          @endforeach

        </tbody>
      </table>

    </div>
  </div>
</div>

@endsection