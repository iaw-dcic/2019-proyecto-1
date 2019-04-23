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
                <a href="/home/cargarlibros/{{$colec->id_collection}}" class="card-link"> Ver</a>
                
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>


  
  @endsection