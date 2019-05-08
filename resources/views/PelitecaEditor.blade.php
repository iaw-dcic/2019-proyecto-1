@extends('layouts.app')


<title>Mi Peliteca</title>

@section('content')
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
<link href="{{ asset('css/stylecss.css') }}" rel="stylesheet">
<link href="{{ asset('css/estilo.css') }}" rel="stylesheet">

<form class="form-inline"  method="POST" action="{{ url('/PelitecaEditor/Generos') }}" >
  @csrf
  <div class="form-group mx-sm-3 mb-2">
    <label>Ingresar titulo</label><pre> </pre>
    <input type="text" name="titulo" class="form-control">
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <label>Ingresar año</label><pre> </pre>
    <input type="text" name="anio" class="form-control">
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <label>Ingresar puntaje</label><pre> </pre>
    <input type="text" name="puntaje" class="form-control">
  </div>
  <div class="form-group">
    <label>Generos</label><pre> </pre>
    <select class="form-control" name="genero">
      @foreach ($caters as $cater)
      <option value="{{$cater->genero}}">{{$cater->genero}}</option>
         @endforeach
    </select><pre>        </pre>
  </div>
  <button type="submit" class="btn btn-primary">Confirmar</button>
</form>

        


 
    

 @foreach ($caters as $cater)
<div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-block btn-primary" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
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
      <th scope="col">Titulo</th>
      <th scope="col">Año</th>
      <th scope="col">Puntaje</th>
      <th scope="col">Estado</th> 
      </tr>
     </thead>
   <tbody>
     
    <tr>

      <td>{{$pelicula->pelicula}}</td>
      <td>{{$pelicula->anio}} </td>
      <td>{{$pelicula->puntaje}} </td>
      <td>
        <form action="{{ url('/PelitecaEditor/'.$pelicula->id) }}" method="POST">
        @csrf
          <input type="hidden" name="_method" value="PUT">
          @if($pelicula->publico == 0)
            <button type="submit" class="btn btn-primary">Mostrar</button>
          @else
            <button type="submit" class="btn btn-primary">Ocultar</a>
          @endif
        </form>
      </td>
      <td>
        <form action="{{ url('/PelitecaEditor/'.$pelicula->id) }}" method="POST">
          @csrf
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="btn btn-primary">Eliminar</button>
        </form>
      </td>
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
