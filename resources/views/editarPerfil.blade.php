@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
        <div class="panel panel-primary">
                <div class="panel-heading text-center titulo"> Editar Perfil</div>
                <div class="panel-body">
                    <form class="form-horizontal" action="/{{ Auth::user()->id }}/editarPerfil" method="POST">
                    {{ method_field('PATCH') }}

                    @csrf


                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right control-label">{{ __('Nombre:') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ auth()->user()->name }}" required autofocus>
                            
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastName" class="col-md-3 col-form-label text-md-right control-label">{{ __('Apellido:') }}</label>

                            <div class="col-md-6">
                                <input id="lastName" type="text" class="form-control{{ $errors->has('lastName') ? ' is-invalid' : '' }}" name="lastName" value="{{ auth()->user()->lastName }}" required autofocus>

                                @if ($errors->has('lastName'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lastName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="img" class="col-md-3 col-form-label text-md-right control-label">{{ __('Cambiar foto de perfil') }}</label>
                            <div class="col-md-6">
                                <input id="img" type="file" class="form-control" name="img">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-3 col-form-label text-md-right control-label">{{ __('Nueva contraseña:') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-3 col-form-label text-md-right control-label">{{ __('Confirmar nueva contraseña:') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-3"></div>
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Confirmar cambios') }}
                                </button>
                            </div>
                        </div>

                    </form>
                    
                </div>

        </div>

    </div>

</div>
@endsection