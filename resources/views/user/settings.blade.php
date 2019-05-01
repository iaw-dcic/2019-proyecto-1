@extends('layouts.master')

@section('title','Configuracion')

@section('content')
<div class="jumbotron">

    <div class="row justify-content-center">
        <div class="col-md-8">
                <h3 class="text-justify">Editar perfil</h3>
                {{--formulario para edicion de perfil--}}
                <form method="POST" action="{{action('UserController@update',['user'=>$user]) }}">
                    @method('PATCH')
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? 'is-invalid' : '' }}"
                            name="name" value="{{ $user->name }}" required autofocus>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? 'is-invalid' : '' }}"
                                name="nombre" value="{{ $user->nombre }}" autofocus>
                                @if ($errors->has('nombre'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    <div class="form-group row">
                        <label for="about" class="col-md-4 col-form-label text-md-right">{{ __('Sobre mi') }}</label>
                        <div class="col-md-6">
                            <textarea id="about" type="text-field" class="form-control" rows="4"
                            name="about">@if ($errors->any()){{old('about')}}@endif</textarea>
                            @if ($errors->has('about'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('about') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Guardar') }}
                            </button>
                        </div>
                    </div>
                </form>
                @include('errors')
        </div>
    </div>
</div>
@endsection
