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
                <h3>Editar lista : {{ $list->name }}</h3>
                <h4>Agrega películas a tu lista ! </h4>
			</div>
			<div class="card-body">
                        <form method="POST" action="{{url('editlist')}}">
                            @csrf
                            <input type="hidden" name="list_id" value="{{$list->id}}">
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
                        <th>Eliminar</th>
                      </thead>
                      <tbody>
                         @foreach ($movies as $movie)
                            <tr>
                                <th>{{ $movie->name}}</th>
                                <td>{{ $movie->director}}</td>
                                <td>{{ $movie->genre}}</td>
                                <td><a type="button" class="btn btn-primary" href=""><i class="fas fa-trash"></i></a></td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection