@extends('layouts.app')


@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">{{$collec->title}}</h1>
    <p class="lead">IAW - 2019</p>
  </div>
</div>

<div class="album py-5">
  <div class="container">
    
      <h4>Categoria: {{$collec->category}}</h4>

      <h5>Descripcion: {{$collec->description}}</h5>

      <table class="table">
        <thead class="thead">
          <tr>
            <th scope="col">Titulo</th>
            <th scope="col">Autor</th>
            <th scope="col">Editorial</th>
            <th scope="col">Cantidad de paginas</th>
          </tr>
        </thead>
        <tbody>

          @foreach ($books as $bk)
          <tr>
            <th scope="row">{{$bk->title}}</th>
            <td>{{$bk->author}}</td>
            <td>{{$bk->editorial}}</td>
            <td>{{$bk->pag}}</td>
          </tr>
          @endforeach

        </tbody>
      </table>

      <a href="/welcome"> Volver</a>
    </div>
  </div>

  @endsection