@extends('layouts.appContent')

@section('titulo')
    Creemos un Juego
@endsection

@section('content')
    <h1> Crea una nueva lista aquí! </h1>


    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('llena los datos de tu juego aquí!') }}</div>

                <div class="card-body">
                    <form method="POST" action="/profiles.show{ {{Auth::user->id}} }">
                        @csrf
                        <div class="form-group">
                            <label for="game_title">Titulo del Juego</label>
                            <input type="text" class="form-control" id="game_title" aria-describedby="listHelp" placeholder="Ingresa el nombre de la lista" name="title" required value="{{old('title')}}">
                        </div>
                        <div class="form-group">
                            <label for="game_genre">Descripcion</label>
                            <input type="text" class="form-control" id="game_genre" aria-describedby="game_genre" placeholder="Ingresa el genero del juego" name="genre" required value="{{old('genre')}}">
                        </div>
                        <div class="form-group">
                            <label for="game_company">compañia</label>
                            <input type="text" class="form-control" id="game_company" aria-describedby="game_company" placeholder="Ingresa la compañia que creó el juego" name="company" required value="{{old('company')}}">
                        </div>
                        <div class="form-group">
                            <label for="release_date">fecha de salida</label>
                            <input type="date" class="form-control" id="release_date" aria-describedby="release_date" placeholder="Ingresa la fecha de salida del juego" name="release_date" required >
                        </div>
                        <div>
                           <input type="hidden" name="userID" value="{{Auth::user()->id}}">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary" >Crear Juego </button>
                        </div>


                    @if($errors->any())
                        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-header">
                                <img src="..." class="rounded mr-2" alt="...">
                                <strong class="mr-auto">Error al ingresar los datos</strong>
                                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="toast-body">
                               @foreach($errors->all() as $error)
                                    <li>{{$error}} </li>
                               @endforeach
                            </div>
                        </div>
                    @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection