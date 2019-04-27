@extends('layouts.app') 
@section('title',' | Registro') 
@section('content')

<!-- Page top section -->
<section class="page-top-section set-bg" data-setbg="img/page-top-bg/4.jpg">
    <div class="page-info">
        <h2>Registrarse</h2>
        <div class="site-breadcrumb">
            <a href="/">Inicio</a> /
            <span>Registrarse</span>
        </div>
    </div>
</section>
<!-- Page top end-->


<!-- Contact page -->
<!--<section class="contact-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Registrarse') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}"
                                        required autofocus> @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span> @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"
                                        required> @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span> @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                        required> @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span> @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Repetir contraseña') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                                    {{ __('Registrarse') }}
                                                </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- Contact page end-->


<section class="custom-form">

    <!-- <div class="video-w3l" data-vide-bg="video/1"> -->
    <h3 style="color:bisque; text-align:center;margin-bottom:20px"> Registrarse </h3>

    <!-- content -->
    <div class="sub-main-w3">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="form-style-agile">
                <label> <i class="fas fa-edit" aria-hidden="true"></i> Nombre *</label>
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}"
                    required autofocus> @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span> @endif
            </div>

            <!-- Username -->
            <div class="form-style-agile">
                <label> <i class="fas fa-user" aria-hidden="true"></i> Nombre de usuario *</label>

                <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" 
                    value="{{ old('username') }}" required> @if ($errors->has('username'))
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span> @endif
            </div>

            <!--Email -->
            <div class="form-style-agile">
                <label> <i class="fa fa-envelope" aria-hidden="true"></i> Email *</label>

                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"
                    required> @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span> @endif
            </div>



            <!-- Password -->
            <div class="form-style-agile">
                <label> <i class="fa fa-unlock-alt" aria-hidden="true"></i> Contraseña *</label>
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                    required> @if ($errors->has('password'))

                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span> @endif
            </div>


            <!--Password confirmation-->
            <div class="form-style-agile">
                <label for="password-confirm"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Confirmar contraseña *</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>

            <input type="submit" value="Confirmar registro">



        </form>

    </div>
</section>
@endsection