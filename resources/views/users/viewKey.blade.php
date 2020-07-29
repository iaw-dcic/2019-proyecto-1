
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Escanee el QR con su aplicación TOTP') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url("usuarios/{$user->id}/editar/viewKey") }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-6">
                                <img src={{$QR}}>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" id="k" name="k" value="{{ $key }}">
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-1">

                                <button type="submit" class="btn btn-primary">
                                    {{('Activar') }}
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
