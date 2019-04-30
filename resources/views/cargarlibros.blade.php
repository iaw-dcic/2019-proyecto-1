@extends('layouts.app')


@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Libros</h1>
    <p class="lead">IAW - 2019</p>
  </div>
</div>

<div class="album py-5 bg-light">
  <div class="container">
    <div class="row">
      @foreach ($books as $bk)
      <div class="col-md-4">
        <div class="col mb-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">{{$bk->title}}</h5>
              <h6 class="card-subtitle mb-2 text-muted">{{$bk->editorial}}</h6>
              <h6 class="card-subtitle mb-2 text-muted">{{$bk->author}}</h6>
              <h6 class="card-subtitle mb-2 text-muted">Cantidad de paginas: {{$bk->pag}}</h6>

              <button type="button" class="btn btn-link" data-toggle="modal" data-target="#myModalE">Eliminar</button>
                            <!-- Modal -->
                            <div class="modal fade" id="myModalE" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <div class="modal-body">
                                            <h4>Eliminar</h4>
                                            <p>Desea eliminar el libro?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <form method="POST" action="/home/cargarlibros/{{$colec->id}}"> {{csrf_field()}}
                                                <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Aceptar</button>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>

            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>

<form method="POST" action="/home/cargarlibros/{{$id}}">
  {{csrf_field()}}

  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row">

        <div class="col-md-4">
          <div class="col mb-4">
            <div class="card">
              <div class="card-body">
                <h4>Cargar nuevo archivo</h4>
                <h5 class="card-title"><input type="text" class="form-control" name="title" placeholder="Titulo" required></h5>
                <h6 class="card-subtitle mb-2 text-muted"><input type="text" class="form-control" name="author" placeholder="Autor" required></h6>
                <h6 class="card-subtitle mb-2 text-muted"><input type="text" class="form-control" name="editorial" placeholder="Editorial" required></h6>
                <h6 class="card-subtitle mb-2 text-muted"><input type="number" class="form-control" name="pag" placeholder="Cantidad paginas" required></h6>

                <br>
                <button type="submit" class="btn btn-link"> Cargar</button>

              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>



  @endsection