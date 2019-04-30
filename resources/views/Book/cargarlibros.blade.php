@extends('layouts.app')


@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Libros</h1>
    <p class="lead">IAW - 2019</p>
  </div>
</div>

<div class="album py-5">
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

              <!-- MODAL DE EDITAR -->
              <button type="button" class="btn btn-link" data-toggle="modal" data-target="#myModalEditar">Editar</button>
              <!-- Modal -->
              <div class="modal fade" id="myModalEditar" role="dialog">
                <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <form method="POST" action="/home/cargarlibros/{{$bk->id}}">
                      {{csrf_field()}}
                      <div class="modal-body">
                        <h4>Editar {{$bk->id}}</h4>

                        <h5 class="card-subtitle mb-2 text-muted"><input type="text" class="form-control" name="title" placeholder="Titulo"></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><input type="text" class="form-control" name="author" placeholder="Autor"></h6>
                        <h6 class="card-subtitle mb-2 text-muted"><input type="text" class="form-control" name="editorial" placeholder="Editorial"></h6>
                        <h6 class="card-subtitle mb-2 text-muted"><input type="number" class="form-control" name="pag" placeholder="Cantidad paginas"></h6>
                        <br>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary" data-toggle="modalEditar" data-target="#myModalEditar">Actualizar</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>


              <!-- MODAL DE ELIMINAR -->
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
                      <p>Desea eliminar el libro? {{$bk->id}}</p>
                    </div>
                    <div class="modal-footer">
                      <form method="POST" action="/home/cargarlibros/{{$bk->id}}">
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-primary" data-toggle="modalE" data-target="#myModalE">Aceptar</button>
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


  <form method="POST" action="/home/cargarlibros/{{$id}}">
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



@endsection