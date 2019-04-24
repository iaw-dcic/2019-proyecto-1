@extends('layouts.app')


@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Mis colecciones de libros</h1>
        <p class="lead">Coleccion de libros.com</p>
    </div>
</div>

<div class="album py-5">
    <div class="container">
        <div class="row">
            @foreach ($collec as $colec)
            <div class="col-md-4">
                <div class="col mb-4">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{$colec->title}}</h5>

                            <p class="card-text">{{$colec->description}}</p>
                            <h1>{{$colec->id_collection}}</h1>
                            <a href="/home/cargarlibros/{{$colec->id}}" class="card-link"> Ver</a>

                            <button type="button" class="btn btn-link" data-toggle="modal" data-target="#myModal">Eliminar</button>

                            <!-- Modal -->
                            <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                     
                                        </div>

                                        <div class="modal-body">
                                            <h4>Eliminar</h4>
                                            <p>Desea eliminar la coleccion de libros?</p>
                                        </div>
                                        <form method="POST" action="/home/editCollection/{{$colec->id}}"> {{csrf_field()}}

                                            <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Aceptar</button>

                                        </form>
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

<form method="POST" action="/home/editCollection">
    {{csrf_field()}}

    <div class="album py-5">
        <div class="container">
            <div class="row">

                <div class="col-md-4">
                    <div class="col mb-4">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h4>Cargar nueva lista</h4>
                                <h5 class="card-title"><input type="text" class="form-control" name="title" placeholder="Titulo"></h5>
                                <p class="card-text"><textarea class="form-control" name="description" rows="3"></textarea></p>


                                <button type="submit" class="btn btn-link"> Cargar</button>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>



    @endsection