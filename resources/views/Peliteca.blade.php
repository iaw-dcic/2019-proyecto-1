@extends('layouts.app')

<title>Peliteca</title>

@section('content')

 <link href="{{ asset('css/estilo.css') }}" rel="stylesheet">
<form class="form-inline"  method="POST" action="Genero" >
  @csrf
  <pre>  </pre>
  <!-- Titulo -->
  <div class="form-group mb-2">
    <input type="text" readonly class="form-control-plaintext" id="staticTitulo" value="Titulo">
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <input type="text" name="titulo" class="form-control">
  </div>
  <!-- Año -->
   <div class="form-group mb-2">
    <input type="text" readonly class="form-control-plaintext" id="staticAnio" value="Año">
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <input type="text" name="anio" class="form-control">
  </div>

  <!-- Puntaje falla por el tem del arreglo-->
  <div class="form-group mb-2">
    <input type="text" readonly class="form-control-plaintext" id="staticPuntaje" value="Puntaje">
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <input type="text" name="puntaje" class="form-control">
  </div>

  <!-- Genero -->
  <div class="form-group">
    <label>Generos <pre>  </pre></label>
    <select class="form-control" name="genero">
      @foreach ($caters as $cater)
      <option value="{{$cater->genero}}">{{$cater->genero}}</option>
         @endforeach
    </select><pre>  </pre>
  </div>
  <!-- Confirmador -->
  <button type="submit" class="btn btn-primary">Ingresar</button>
</form>

        


 
    

 @foreach ($caters as $cater)
<div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-block btn-primary btn-borderless collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
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
