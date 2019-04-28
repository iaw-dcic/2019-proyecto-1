@extends('layouts.app')

@section('title')
	Editar {{$list->name}}
@endsection

@section('content')
	<h2 class="text-center">Editar lista</h2>
	<form method="POST" action="/lists/{{$list->id}}">
                        @csrf
                        @method('PATCH')

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de la lista') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="name" class="form-control" name="name" required autofocus value="{{$list->name}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="public" id="public">

                                    <label class="form-check-label" for="public">
                                        {{ __('¿Pública?') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Aplicar cambios') }}
                                </button>
                            </div>
                        </div>
                    </form>

@endsection