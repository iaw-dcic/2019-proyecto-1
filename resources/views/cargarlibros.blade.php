@extends('layouts.app')


@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Libros</h1>
    <p class="lead">Coleccion de libros.com</p>
  </div>
</div>

<div class="album py-5 bg-light">
    <div class="container">
      <div class="row">
        @foreach ($books as $bk)
        <div class="col-md-4">
          <div class="col mb-4">
            <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title">{{$bk->title}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{$bk->category}}</h6>
                <p class="card-text">{{$bk->description}}</p>
                
                
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>  

<form method="POST" action="/home/cargarlibros/{$id}">
  {{csrf_field()}}

  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row">

        <div class="col-md-4">
          <div class="col mb-4">
            <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h4>Cargar nuevo archivo {$id}</h4>
                <h5 class="card-title"><input type="text" class="form-control" name="title" placeholder="Titulo"></h5>
                <h6 class="card-subtitle mb-2 text-muted"><input type="text" class="form-control" name="category" placeholder="Categoria"></h6>
                <h6 class="card-subtitle mb-2 text-muted"><input type="text" class="form-control" name="author" placeholder="Autor"></h6>

                <p class="card-text"><textarea class="form-control" name="description" rows="3"></textarea></p>

                <input type="file" class="form-control-file" id="exampleFormControlFile1">
                <br>
                <button type="submit" class="card-link"> Cargar</button>

              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>


 
  @endsection