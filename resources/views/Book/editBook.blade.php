@extends('layouts.app')


@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Editar libro: {{$book->title}}</h1>
        <p class="lead">IAW - 2019</p>
    </div>
</div>



<div class="container">
    <h4>Editar</h4>
    <form method="POST" action="/home/loadBooks/editBook/{{$id}}">
        {{csrf_field()}}
        <div class="form-group">
            <label for="title" name="title" class="col-form-label">Titulo</label>
            <input type="text" class="form-control" name="title" placeholder=" {{$book->title}}">
        </div>
        <div class="form-group">
            <label for="author" name="author" class="col-form-label">Autor</label>
            <input type="text" class="form-control" name="author" placeholder=" {{$book->author}}">
        </div>

        <div class="form-group">
            <label for="editorial" name="editorial" class="col-form-label">Editorial</label>
            <input type="text" class="form-control" name="editorial" placeholder=" {{$book->editorial}}">
        </div>
        <div class="form-group">
            <label for="pag" name="pag" class="col-form-label">Cantidad Paginas</label>
            <input type="number" class="form-control" name="pag" placeholder=" {{$book->pag}}">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>

    </form>
</div>
@endsection