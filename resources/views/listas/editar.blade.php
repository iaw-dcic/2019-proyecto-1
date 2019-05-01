@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="card card-outline-secondary">
                    <div class="card-header">
                        <h4 class="mb-0">{{ __('Editar Lista') }}</h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('actualizar-lista', $list['id']) }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right form-control-label">{{ __('Nombre') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ $list['name'] }}" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="status1" value="Publica" {{ $list['status']=='Publica' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="status1">
                                            {{ __('Publica') }}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="status2" value="Privada" {{ $list['status']=='Publica' ? '' : 'checked' }}>
                                        <label class="form-check-label" for="status2">
                                            {{ __('Privada') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    {{-- <input type="reset" class="btn btn-secondary" value="Cancelar"> --}}
                                    {{-- <a href="{{ route('mis-listas') }}" class="btn btn-secondary">Cancelar</a> --}}
                                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancelar</a>
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Actualizar lista') }}
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
