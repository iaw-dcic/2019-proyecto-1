@extends('layouts.app')

@section('title')
	Crear nueva película
@endsection

@section('content')
    <h2 class="text-center">Crear película</h2>
	<form method="POST" action="/lists/{{$list->id}}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de la película') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="name" class="form-control" name="name" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Género" class="col-md-4 col-form-label text-md-right">{{ __('Género') }}</label>

                            <div class="col-md-6">
                                <input id="genre" type="name" class="form-control" name="genre" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="year" class="col-md-4 col-form-label text-md-right">{{ __('Año de lanzamiento') }}</label>

                            <div class="col-md-6">
                                <input id="year" type="number" class="form-control" name="year" required autofocus min="0" max="9999">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Sinopsis') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Añadir película') }}
                                </button>
                            </div>
                        </div>
                    </form>
@endsection