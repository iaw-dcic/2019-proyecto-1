@extends('layouts.app')

<title>Peliteca</title>

@section('content')
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
<link href="{{ asset('css/stylecss.css') }}" rel="stylesheet">
<link href="{{ asset('css/estilo.css') }}" rel="stylesheet">
<form class="form-inline"  method="POST" action="Genero" >
  @csrf
 @foreach ($caters as $cater)
<div class="accordion" id="accordionExample" text-align="center">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-block btn-primary collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          {{$cater->genero}}
        </button>
      </h2>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        
        @foreach ($peliculas as $pelicula)
        @if($pelicula->genero==$cater->genero)
       
       <table class="table table-borderless">
        <thead>
          <tr> 
            <th scope="col">Pelicula</th>
            <th scope="col">Año</th>
            <th scope="col">Puntaje</th> 
          </tr>
        </thead>
   <tbody>
     
    <tr>

      <td>{{$pelicula->pelicula}}</td>
      <td>{{$pelicula->anio}} </td>
      <td>{{$pelicula->puntaje}} </td>
    </tr>
  </tbody>
</table>
            

           
       @endif
      @endforeach
      </div>
    </div>
  </div>
  @endforeach
  
@endsection
