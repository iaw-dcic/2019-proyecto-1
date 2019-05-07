@extends('layouts.app')
<title>Mi Perfil</title>
@section('content')
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
<link href="{{ asset('css/stylecss.css') }}" rel="stylesheet">
<link href="{{ asset('css/estilo.css') }}" rel="stylesheet">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Usuario') }}</div>

                <div class="card-body">
                        @csrf
                        <div class="form-group row">
                            <label for="actualname" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}:</label>
                            <label for="username" class="col-md-6 col-form-label text-md-left">{{$user->name}}</label>
                        </div>

                        <div class="form-group row">
                            <label for="actuallastname" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}:</label>
                            <label for="userlastname" class="col-md-6 col-form-label text-md-left">{{$user->lastname}}</label>
                        </div>

                        <div class="form-group row">
                            <label for="actualemail" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}:</label>
                            <label for="useremail" class="col-md-6 col-form-label text-md-left">{{$user->email}}</label>
                        </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">{{ __('Cambios') }}</div>

                <div class="card-body">
                    <form method="PUT" action="{{ route('users.update',Auth::user()->id) }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}:</label>

                            <div class="col-md-6">
                                <input id="name" type="text" placeholder="Nombre nuevo"class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}:</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" placeholder="Apellido nuevo"class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" value="{{ old('lastname') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}:</label>

                            <div class="col-md-6">
                                <input id="email" type="email" placeholder="E-Mail nuevo"class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Aplicar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
