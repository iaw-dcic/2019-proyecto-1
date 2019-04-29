@extends('layouts.app')

@section('title')
	Cambiar Contraseña
@endsection

@section('content')
	<h2 class="text-center">Cambiar contraseña</h2>
	<form method="POST" action="/changepassword">
                        @csrf
                        @method('PATCH')

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nueva contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="pass" type="password" class="form-control" name="pass" required autofocus>
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