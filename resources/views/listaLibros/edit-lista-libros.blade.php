@extends('layouts.appIndex')

@section('contenido')

   <!-- Bootstrap Boilerplate... -->

   
   <div class="container">

        <!-- New Task Form -->
        <div class="col-sm-4 border">
         @foreach ($listas as $lista)
        <form action="{{route('add-libro', ['id'=>$lista->id])}}" method="GET">
                {{ csrf_field() }}    
                <!-- Task Name -->
                <div class="form-group">
                <label  class="row-sm-3  ">Coleccion libros</label>
                    <tr>
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Titulo</th>
                                <th scope="col">Autor</th>
                                <th scope="col">Genero</th>
                                </tr>
                            </thead>
                            <tbody>
                        @foreach ($lista->libros as $libro)
                            <tr>
                            <th scope="row border"> </th>
                            <td>{{$libro->Titulo}}</td>
                            <td>{{$libro->Genero}}</td>
                            <td>{{$libro->Autor}}</td>
                            </tr>          
                        @endforeach 
                    </tbody>
                </table>
                </tr>
                </div>
    
                <!-- Add Task Button -->
                <div class="form-group ">
                    <div class="row-sm-offset-3 row-sm-6">
                        <button type="submit" class="btn btn-success">
                            Agregar libro
                        </button>
                    </div>
                </div>
            </form>
            <!-- Delete Button -->
            <form action="{{route('delete-lista-libros', ['id'=> $lista->id])}}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
        
                    <button class="btn btn-danger">Borrar</button>
            </form>
            @endforeach 
        </div>        
        <div class="container border-0">
            <form action="{{route('crearListaLibros')}}" method="post">
                @csrf
                <button type="submit" class="btn btn-primary">Crear nueva lista de libros</button>
            </form>
        </div>
    </div>
    <!-- TODO: Current Tasks -->
@endsection  