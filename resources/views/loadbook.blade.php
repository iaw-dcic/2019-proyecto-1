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
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{$bk->title}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{$bk->author}}</h6>
                
                
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>  
 
  @endsection