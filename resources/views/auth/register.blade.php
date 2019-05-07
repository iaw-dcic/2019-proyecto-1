@extends('layouts.app')

<title>Register - Carteleras</title>
@section('content')
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
<link href="{{ asset('css/stylecss.css') }}" rel="stylesheet">
<link href="{{ asset('css/estilo.css') }}" rel="stylesheet">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                           <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>
                           <div class="col-md-6">
                           @if(!empty($name))
                               <input id="name" type="text" class="form-control" name="name" value="{{$name}}" required autofocus>
                           @else
                               <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                           @endif    
                               @if ($errors->has('name'))
                                   <span class="help-block">
                                       <strong>{{ $errors->first('name') }}</strong>
                                   </span>
                               @endif
                           </div>
                       </div>

                       <div class="form-group row">
                           <label for="lastname" class="col-md-4 col-form-label text-md-right">Apellido</label>
                           <div class="col-md-6">
                           @if(!empty($lastname))
                               <input id="lastname" type="text" class="form-control" name="lastname" value="{{$lastname}}" required autofocus>
                           @else
                               <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" required autofocus>
                           @endif    
                               @if ($errors->has('lastname'))
                                   <span class="help-block">
                                       <strong>{{ $errors->first('lastname') }}</strong>
                                   </span>
                               @endif
                           </div>
                       </div>

                       <div class="form-group row">
                           <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail</label>
                           <div class="col-md-6">
                               @if(!empty($email))
                               <input id="email" type="email" class="form-control" name="email" value="{{$email}}" required>
                               @else
                               <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                               @endif
                               @if ($errors->has('email'))
                                   <span class="help-block">
                                       <strong>{{ $errors->first('email') }}</strong>
                                   </span>
                               @endif
                           </div>
                       </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autocomplete="new-password">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
