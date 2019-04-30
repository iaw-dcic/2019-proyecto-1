@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editing " {{$lista->nombre}} "</div>

                <div class="card-body">                    
                    
                        <form method="POST" action="{{url('lista/modificar')}}">
                          {{csrf_field()}}
                          <input type="hidden" name="listaid" value="{{$lista->id}}">
                          <p><label for='nombre'>Name: </label> <input type="text" name="nombre" class="form-control" ></p>
                          <p><label for='visible'>Description: </label> <input type="text" name="descripcion" class="form-control"></p>
                          <p><label for='visible'>Genre: </label> <input type="text" name="genero" class="form-control" ></p>
                          <button type="submit" class="btn btn-primary">Add New Movie</button>
                       </form>
                        <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">Name</th>
                          <th scope="col">Description</th>
                          <th scope="col">Genre</th>
                          <th scope="col">Remove</th>
                        </tr>
                      </thead>
                      <tbody>
                         @foreach ($peliculas as $pelicula)
                            <tr>
                                <th scope="row">{{ $pelicula->nombre}}</th>
                                <td>{{ $pelicula->descripcion}}</td>
                                <td>{{ $pelicula->genero}}</td>
                                <td><a type="button" class="btn btn-primary" href="/pelicula/remove/{{$pelicula->id}}"><i class="fas fa-trash"></i></a></td>
                            </tr>
                        @endforeach
                        
                        
                      </tbody>
                    </table>
                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection