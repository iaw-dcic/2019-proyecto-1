@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
            @endif

            <div class="card">
                <div class="card-header">{{ __('Editar Lista') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('list.update', ['lista' => $list->id]) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $list->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                       </div>  
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Público') }}</label>
                            <div class="col-md-6">

                                <select id="public_list" class="form-control{{ $errors->has('public_list') ? ' is-invalid' : '' }}" name="public_list" required>
                                        <option {{ ($list->public_list == 0 ? 'selected' : '') }} value="0">No</option>

                                        <option {{ ($list->public_list == 1 ? 'selected' : '') }} value="1">Si</option>
                                </select>


                                @if ($errors->has('public_list'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('public_list') }}</strong>
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
