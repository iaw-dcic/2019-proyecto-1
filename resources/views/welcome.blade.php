@extends('layouts.app')

@section('content')

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Colecciones</h1>
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
                <h6 class="card-title">{{$colec->category}}</h6>
                <p class="card-text">{{$colec->description}}</p>
               
                <a href="/welcome/loadbook/{{$colec->id}}" class="card-link"> Ver</a>
                
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection