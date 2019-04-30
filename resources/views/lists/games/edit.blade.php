@extends('layouts.appContent')

@section('titulo')
    editar datos Juego
@endsection

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('cambia los datos de tu juego aquí!') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{route('gamePatch', [$juegoInfo[0]->list_id , $juegoInfo[0]->id])}}">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="game_title">Titulo del Juego</label>
                                <input type="text" class="form-control" id="game_title" aria-describedby="listHelp" placeholder="Ingresa el nombre del juego" name="title" required value="{{$juegoInfo[0]->name}}">
                            </div>
                            <div class="form-group">
                                <label for="game_genre">Descripcion</label>
                                <input type="text" class="form-control" id="game_genre" aria-describedby="game_genre" placeholder="Ingresa el genero del juego" name="genre" required value="{{$juegoInfo[0]->genre}}">
                            </div>
                            <div class="form-group">
                                <label for="game_company">compañia</label>
                                <input type="text" class="form-control" id="game_company" aria-describedby="game_company" placeholder="Ingresa la compañia que creó el juego" name="company" required value="{{$juegoInfo[0]->company}}">
                            </div>
                            <div class="form-group">
                                <label for="release_date">fecha de salida</label>
                                <input type="date" class="form-control" id="release_date" aria-describedby="release_date" placeholder="Ingresa la fecha de salida del juego" name="release_date" required value="{{$juegoInfo[0]->release_date}}">
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary" >Guardar Datos Juego </button>
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