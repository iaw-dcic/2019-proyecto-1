@extends('layouts.app')


@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Mis colecciones de libros</h1>
        <p class="lead">IAW - 2019</p>
    </div>
</div>

<div class="album py-5">
    <form method="POST" action="/home/storeCollection">
        {{csrf_field()}}

        <div class="album py-5">
            <div class="container">
                <div class="row">

                    <div class="col-md-4">
                        <div class="col mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4>Cargar nueva lista</h4>
                                    <h5 class="card-title"><input type="text" class="form-control" name="title" placeholder="Titulo" required></h5>
                                    <h5 class="card-title"><input type="text" class="form-control" name="category" placeholder="Categoria" required></h5>
                                    <p class="card-text"><textarea class="form-control" name="description" rows="3" required></textarea></p>


                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="pp" value="publica" id="pp1" class="custom-control-input">
                                        <label class="custom-control-label" for="pp1">Publica</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="pp" id="pp2" value="privada" class="custom-control-input">
                                        <label class="custom-control-label" for="pp2">Privada</label>
                                    </div>
                                    <!--
                                <div>
                                    <input type="radio" name="pp" value="publica" id="pp1">
                                    <label for="pp1">Publica</label>
                                </div>
                                <div>
                                    <input type="radio" name="pp" id="pp2" value="privada" >
                                    <label for="pp2">Privada</label>
                                </div>
                                -->
                                    <div>
                                        <button type="submit" class="btn btn-link"> Cargar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>


    <div class="container">
        <div class="row">
            @foreach ($collec as $colec)
            <div class="col-md-4">
                <div class="col mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h4>Titulo: </h4>
                            <h6 class="card-title">{{$colec->title}}</h6>
                            <h4>Categoria: </h4>
                            <h6 class="card-title">{{$colec->category}}</h6>
                            <h4>Descripcion: </h4>
                            <h6 class="card-title">{{$colec->description}}</h6>

                            <a href="/home/loadBooks/{{$colec->id}}" class="card-link"> Ver</a>
                            <a href="/home/storeCollection/editCollection/{{$colec->id}}" class="card-link"> Editar</a>
                            <a href="/home/storeCollection/deleteCollection/{{$colec->id}}" class="card-link"> Eliminar</a>

                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection