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
                        <h4 class="mb-0">{{ __('Nuevo Libro') }}</h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('crear-libro', $id ) }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right form-control-label">{{ __('Nombre') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="author" class="col-md-4 col-form-label text-md-right form-control-label">{{ __('Autor') }}</label>
                                <div class="col-md-6">
                                    <input id="author" type="text" class="form-control" name="author" value="" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="year" class="col-md-4 col-form-label text-md-right form-control-label">{{ __('Año') }}</label>
                                <div class="col-md-6">
                                    <input id="year" type="text" class="form-control" name="year" value="" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    {{-- <input type="reset" class="btn btn-secondary" value="Cancelar"> --}}
                                    <a href="{{ route('show-lista', $id) }}" class="btn btn-secondary">Cancelar</a>
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Crear libro') }}
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
