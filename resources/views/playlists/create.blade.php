@extends('layouts.master')
@section('content')
    <div class="container">
        <h2>Nueva playlist de {{auth()->user()->name}}</h2>
    </div>
    <div class="container">
        {{--formulario para creacion--}}
        <form method="POST" action="{{ url(auth()->user()->id,'playlists') }}">
            @csrf
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
                <div class="col-md-6">
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Descripcion') }}</label>
                <div class="col-md-6">
                    <textarea id="description" type="text-field" class="form-control" rows="3"
                    name="description">@if ($errors->any()){{old('description')}}@endif</textarea>
                    @if ($errors->has('description'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Crear') }}
                    </button>
                </div>
            </div>

        </form>
        @include('errors')
    </div>
    <div class="container">
        <a class="btn btn-lg btn-secondary" href="{{ route('home') }}" a>Volver</a>
    </div>
@endsection
