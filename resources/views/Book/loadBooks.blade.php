@extends('layouts.app')


@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Libros</h1>
    <p class="lead">IAW - 2019</p>
  </div>
</div>
<div class="container">
  <div class="row">

    <div class="col-4">
      <form method="POST" action="/home/loadBooks/{{$id}}">
        {{csrf_field()}}

        <div class="container">
          <div class="row">
            <div class="col-md-4">
              <div class="col mb-4">
                <div class="card">
                  <div class="card-body">
                    <h4>Cargar nuevo archivo</h4>
                    <h5 class="card-subtitle mb-2 text-muted"><input type="text" class="form-control" name="title" placeholder="Titulo" required></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><input type="text" class="form-control" name="author" placeholder="Autor" required></h6>
                    <h6 class="card-subtitle mb-2 text-muted"><input type="text" class="form-control" name="editorial" placeholder="Editorial" required></h6>
                    <h6 class="card-subtitle mb-2 text-muted"><input type="number" class="form-control" name="pag" placeholder="Cantidad paginas" required></h6>
                    <button type="submit" class="btn btn-link"> Cargar</button>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </form>
    </div>

    <div class="col-8">
      <div class="container">
        <div class="row">
          @foreach ($books as $bk)
          <div class="col-md-4">
            <div class="col mb-4">
              <div class="card">
                <div class="card-body">
                  <h4>Titulo: </h4>
                  <h6 class="card-title">{{$bk->title}}</h6>
                  <h4>Editorial: </h4>
                  <h6 class="card-title">{{$bk->editorial}}</h6>
                  <h4>Autor: </h4>
                  <h6 class="card-title">{{$bk->author}}</h6>
                  <h4>Cantidad de paginas: </h4>
                  <h6 class="card-title">{{$bk->pag}}</h6>

                  <a href="/home/loadBooks/editBook/{{$bk->id}}" class="card-link"> Editar</a>
                  <a href="/home/loadBooks/deleteBook/{{$bk->id}}" class="card-link"> Eliminar</a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
</div>

@endsection