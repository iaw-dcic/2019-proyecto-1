
@extends('partials.auth.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Registro</div>

                    <div class="card-body">
                        <div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Nombre y Apellido</label>

                                <div class="col-md-6">
                                    <input id="inputName" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>
                                <div class="col-md-6">
                                    <input id="inputUsername" type="text" name="username" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="birthday" class="col-md-4 col-form-label text-md-right">Fecha de Nacimiento</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="date" id="inputBirthday">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="prefered_genres" class="col-md-4 col-form-label text-md-right">Genero Preferido</label>
                                <div class="col-md-6">
                                    <select class="form-control" id="inputGeneroPreferido" required >
                                        <option selected >Rock</option>
                                        <option>Pop</option>
                                        <option>Indie</option>
                                        <option>Rap</option>
                                        <option>Country</option>
                                        <option>Soul</option>
                                        <option>Dance</option>
                                        <option>Folk</option>
                                        <option>Tango</option>
                                        <option>Blues</option>
                                        <option>Jazz</option>
                                        <option>Reggae</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="gender" class="col-md-4 col-form-label text-md-right">Sexo</label>
                                <div class="col-md-6 text-left">
                                    <label class="form-check">
                                        <input type="radio" class="form-check-input" name="optionsRadios" checked="" value="No definido" >
                                        No definido
                                    </label>
                                    <label class="form-check">
                                        <input type="radio" class="form-check-input" name="optionsRadios" value="Mujer" >
                                        Mujer
                                    </label>
                                    <label class="form-check">
                                        <input type="radio" class="form-check-input" name="optionsRadios" value="Hombre" >
                                        Hombre
                                    </label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Correo Electronico</label>

                                <div class="col-md-6">
                                    <input id="inputEmail" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="inputPassword" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

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
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                        </div>

                        <div class="text-center">
                            <button onclick="register()" class="btn btn-primary">Registrarse</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/register.js') }}"></script>
@endsection
