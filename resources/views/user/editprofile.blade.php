@extends('layouts.app')

@section('title')
	Editar Perfil
@endsection

@section('content')
	<h2 class="text-center">Editar perfil</h2>
	<form method="POST" action="/editprofile">
                        @csrf
                        @method('PATCH')

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="name" class="form-control" name="name" required autofocus value="{{auth()->user()->name}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Género') }}</label>

                            <div class="col-md-6">
                                <input id="gender" type="name" class="form-control" name="gender"  autofocus value="{{auth()->user()->gender}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Acerca de mi') }}</label>

                            <div class="col-md-6">
                                <input id="about" type="name" class="form-control" name="about"  autofocus value="{{auth()->user()->about}}">
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