@extends('layouts.appIndex')

@section('contenido')
  <!-- Bootstrap Boilerplate... -->

  <!-- Add icon library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <div class="container">

        <!-- New Task Form -->
        <div class="col-md-8 col-xs-6 border">
         @foreach ($listas as $lista) 
          <!-- Task Name -->
          <div class="form-group">
              <tr>
                  <table class="table">
                      <thead>
                          <tr>
                          <th scope="col">#</th>
                          <th scope="col">Titulo</th>
                          <th scope="col">Autor</th>
                          <th scope="col">Genero</th>
                          <th scope="col">Edit</th>                      
                          <th scope="col">Delete</th>
                          </tr>
                      </thead>
                      <tbody>
                    @foreach ($lista->libros as $libro)
                        <tr>
                        <th scope="row border"> </th>
                        <td>{{$libro->Titulo}}</td>
                        <td>{{$libro->Genero}}</td>
                        <td>{{$libro->Autor}}</td>
                        <td>
                            <button type="button" class="btn btn-info" data-id={{$libro->id}} data-titulo={{$libro->Titulo}} data-genero={{$libro->Genero}} data-autor={{$libro->Autor}}  data-toggle="modal" data-target="#editarLibro">
                                <i class="fa fa-pencil"></i>
                            </button>
                        </td>
                        <td>        
                            <button type="button" class="btn btn-danger" data-id={{$libro->id}} data-toggle="modal" data-target="#eliminarLibro">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                        </tr>          
                        @endforeach 
                </tbody>
                </table>
                </tr>
                </div>
    
                <!-- Add Task Button -->
                <form action="{{route('add-libro', ['id'=>$lista->id])}}" method="GET">
                        {{ csrf_field() }}   
                    <div class="form-group ">
                        <div class="row-sm-offset-3 row-sm-6">
                            <button type="submit" class="btn btn-success">
                                Agregar libro
                            </button>
                        </div>
                    </div>
                </form>
                <!-- Toggle Button -->
                <form action="{{route('toggle-list', ['id'=> $lista->id])}}" method="POST">
                    @csrf
                    <button class="btn btn-success">
                        @if ($lista->privada)
                            Hacer publica
                        @else
                            Hacer privada
                        @endif
                    </button>
                </form>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger"  data-id={{$lista->id}} data-toggle="modal" data-target="#eliminarLista">
                    Borrar lista
                </button>         

            @endforeach 
        </div>        
        <div class="container border-0">
            <form action="{{route('crearListaLibros')}}" method="post">
                @csrf
                <button type="submit" class="btn btn-primary">Crear nueva lista de libros</button>
            </form>
        </div>
    </div>

     <!-- Modal eliminar lista-->
    <div class="modal fade" id="eliminarLista" tabindex="-1" role="dialog" aria-labelledby="eliminarListaLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="eliminarListaLabel">Eliminar lista</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="{{route('delete-lista-libros')}}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}   
                <div class="modal-body">
                    ¿Seguro quiere eliminar la lista seleccionada?
                    <input type="hidden" name="id_lista" id="id_lista" value="">
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-danger">Borrar lista</button>
            </form>
            </div>
        </div>
        </div>
    </div>

    <!-- Modal eliminar libro-->
    <div class="modal fade" id="eliminarLibro" tabindex="-1" role="dialog" aria-labelledby="eliminarLibroLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eliminarLibroLabel">Eliminar libro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('delete-libro')}}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}   
                <div class="modal-body">
                    ¿Seguro quiere eliminar el libro seleccionado?
                    <input type="hidden" name="id_libro" id="id_libro" value="">
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-danger">Borrar libro</button>
            </form>
        </div>
            </div>
        </div>
    </div>

    <!-- Modal editar libro-->
    <div class="modal fade" id="editarLibro" tabindex="-1" role="dialog" aria-labelledby="editarLibroLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarLibroLabel">Editar libro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('edit-libro')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="titulo-name" class="col-form-label">Titulo:</label>
                        <input type="text" class="form-control" name="titulo" id="titulo-name" value="">
                    </div>
                    <div class="form-group">
                        <label for="genero-name" class="col-form-label">Genero:</label>
                        <input type="text" class="form-control" name="genero" id="genero-name" value="">
                    </div>
                    <div class="form-group">
                        <label for="autor-name" class="col-form-label">Autor:</label>
                        <input type="text" class="form-control" name="autor" id="autor-name" value="">
                    </div>
                    <input type="hidden" id="id_libro" name="id_libro" value ="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>
            </div>
        </div>
        </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>    
            $('#eliminarLibro').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) 
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body #id_libro').val(id)
            })      
    </script>

    <script >    
        $('#eliminarLista').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id') 
        var modal = $(this)
        modal.find('.modal-body #id_lista').val(id)
        })      
    </script>

    <script>    
        $('#editarLibro').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) 
        var id = button.data('id')
        var autor = button.data('autor')
        var titulo = button.data('titulo')
        var genero = button.data('genero')
        var modal = $(this)
        modal.find('.modal-body #id_libro').val(id)
        modal.find('.modal-body #titulo-name').val(titulo)
        modal.find('.modal-body #genero-name').val(genero)
        modal.find('.modal-body #autor-name').val(autor)
        })      
    </script>
@endsection  