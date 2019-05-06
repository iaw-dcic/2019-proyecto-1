@extends('layouts.app')

<title>Peliteca</title>

@section('content')

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

    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        
        @foreach ($peliculas as $pelicula)
        @if($pelicula->genero==$cater->genero)
       
       <table class="table table-borderless">
        <thead>
          <tr> 
            <th scope="col">Pelicula</th>
            <th scope="col">Año</th>
            <th scope="col">Estado</th> 
          </tr>
        </thead>
   <tbody>
     
    <tr>

      <td>{{$pelicula->pelicula}}</td>
      <td>{{$pelicula->anio}} </td>
      <td><a  href="{{ url('/home',['nom' => $pelicula->pelicula, 'cate' => $cater->genero])}}"
            class="btn btn-outline-dark btn-sm">  Eliminar</a>
            @if($pelicula->publico=='false')
           <a href="{{ url('/home',['nom' => $pelicula->pelicula])}}"
            class="btn btn-outline-dark btn-sm">       Publicar</a></td>
            @else
            <a href="{{ url('/home',['nom' => $pelicula->pelicula])}}"
            class="btn btn-outline-dark btn-sm">       Privado</a></td>
            @endif
    </tr>
  </tbody>
</table>
            

           
       @endif
      @endforeach
      </div>
    </div>
  </div>
  @endforeach


<!--<form class="form-inline" method="POST" action="Coleccion">
   @csrf
  <div class="form-group mb-2">
    <label for="staticEmail2" class="sr-only">Email</label>
    <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="agregar categoria">
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <input type="text" class="form-control" name="name">
  </div>
  <button type="submit" class="btn btn-primary mb-2">Añadir</button>
</form>-->

  
@endsection
