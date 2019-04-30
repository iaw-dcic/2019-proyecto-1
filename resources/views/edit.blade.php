@extends('layouts.app')


@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Mis colecciones de libros</h1>
        <p class="lead">Coleccion de libros.com</p>
    </div>
</div>



<div class="container">
    <h4>Editar</h4>
    <form method="POST" action="/home/editCollection/edit/{{$id}}"> {{csrf_field()}}
        <div class="form-group">
            <label for="name" name="titulo" class="col-form-label">Titulo</label>
            <input type="text" class="form-control" id="name" name="titulo" placeholder="{{$collec->title}}">
        </div>
        <div class="form-group">
            <label for="category" name="categoria" class="col-form-label">Categoria</label>
            <input type="text" class="form-control" id="category" name="categoria" placeholder="{{$collec->category}}">
        </div>
        <div class="form-group">
            <label for="text" class="col-form-label">Descripcion</label>
            <textarea class="form-control" id="text" name="descrip" placeholder="{{$collec->description}}"></textarea>
        </div>
        <div class="form-group">
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" name="pp" value="publica" id="pp1" class="custom-control-input">
                <label class="custom-control-label" for="pp1">Publica</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" name="pp" id="pp2" value="privada" class="custom-control-input">
                <label class="custom-control-label" for="pp2">Privada</label>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Aceptar</button>
        </div>
    </form>
</div>
@endsection