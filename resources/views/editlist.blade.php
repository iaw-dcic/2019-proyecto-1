@extends('layout')

@section('head')
    @parent
    <link href="{{asset('css/editlist.css')}}" rel="stylesheet">
@endsection

@section('content')

<div class="container">
	<div class="d-flex justify-content-center">
		<div class="card">
			<div class="card-header">
                <h3>{{ $list->name}}</h3>
                <h4>Agrega películas a tu lista ! </h4>
			</div>
			<div class="card-body">
                        <form method="POST" action="{{url('editlist/'.$list->id)}}">
                            @csrf
                            <input type="hidden" name="id_list" value="{{$list->id}}">
                            <div class="input-group form-group">
						        <div class="input-group-prepend">
							        <span class="input-group-text"><i class="fas fa-video"></i></span>
						        </div>
                                <input id="name" type="text" class="form-control" name="name" placeholder="Nombre pelicula" required autofocus>
                             </div>
                            <div class="input-group form-group">
						        <div class="input-group-prepend">
							        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input id="director" type="text" class="form-control" name="director" placeholder="Director" required autofocus>
                            </div>
                            <div class="input-group form-group">
						        <div class="input-group-prepend">
							        <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                                </div>
                                <input id="genre" type="text" class="form-control" name="genre" placeholder="Género" required autofocus>
                            </div>
                            <div class="form-group">
						        <input type="submit" value="Agregar" class="btn float-right login_btn">
					        </div>
                       </form>
                        <table class="table text-center">
                      <thead>
                        <th>Nombre</th>
                        <th>Director</th>
                        <th>Género</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                      </thead>
                      <tbody>
                         @foreach ($movies as $movie)
                            <tr>
                                <th>{{ $movie->name}}</th>
                                <td>{{ $movie->director}}</td>
                                <td>{{ $movie->genre}}</td>
                                <td><button type="button" class="btn btn-info" data-id={{$movie->id}} data-name={{$movie->name}} data-director={{$movie->director}}  data-genre={{$movie->genre}}  data-toggle="modal" data-target="#editMovie">
                                    <i class="fas fa-edit"></i>
                                    </button>
                                </td>
                                <td><button type="button" class="btn btn-danger" data-id={{$movie->id}} data-toggle="modal" data-target="#deleteMovie">
                                    <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


 <!-- Modal editar pelicula-->
 <div class="modal fade" id="editMovie" tabindex="-1" role="dialog" aria-labelledby="editMovieLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editMovieLabel">Editar película</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('edit_movie')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="movie-name" class="col-form-label">Nombre película:</label>
                        <input type="text" class="form-control" name="name" id="movie-name" value="">
                    </div>
                    <div class="form-group">
                        <label for="director-name" class="col-form-label">Director:</label>
                        <input type="text" class="form-control" name="director" id="director-name" value="">
                    </div>
                    <div class="form-group">
                        <label for="genre-name" class="col-form-label">Género:</label>
                        <input type="text" class="form-control" name="genre" id="genre-name" value="">
                    </div>
                    <input type="hidden" id="id_movie" name="id_movie" value ="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal eliminar pelicula-->
<div class="modal fade" id="deleteMovie" tabindex="-1" role="dialog" aria-labelledby="deleteMovieLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteMovieLabel">Eliminar película</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('delete_movie')}}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}   
                <div class="modal-body">
                    ¿Está seguro que quiere eliminar la película?
                    <input type="hidden" name="id_movie" id="id_movie" value="">
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger">Aceptar</button>
            </form>
        </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script>    
            $('#deleteMovie').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) 
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body #id_movie').val(id)
            })      
    </script>
    
    <script>    
        $('#editMovie').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) 
        var id = button.data('id')
        var director = button.data('director')
        var name = button.data('name')
        var genre = button.data('genre')
        var modal = $(this)
        modal.find('.modal-body #id_movie').val(id)
        modal.find('.modal-body #movie-name').val(name)
        modal.find('.modal-body #genre-name').val(genre)
        modal.find('.modal-body #director-name').val(director)
        })      
    </script>

@endsection