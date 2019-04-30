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

<section class="custom-form">

    <!-- <div class="video-w3l" data-vide-bg="video/1"> -->
    <h3 style="color:bisque; text-align:center;margin-bottom:20px"> Registrarse </h3>

    <!-- content -->
    <div class="sub-main-w3">
        <form method="POST" action="{{ route('register') }}">
            @csrf {{ csrf_field() }}


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
                <label> <i class="fa fa-envelope" aria-hidden="true"></i>Email</label>
                <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"
                    required>
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

            <label style="color:burlywood">Los campos marcados con un * son requeridos</label>

            <div class="form-style-agile" style="margin-top:10px;text-align:center">
                <button type="submit" class="btn btn-primary">
                       Registrarse
                </button>
            </div>

            <!--Submit -->
            <!--<input type="submit" value="Confirmar registro">-->

            <!--Social networks -->
            <div class="footer-social">
                <label for="email"> <h2>O registrate con:</h2> </label>
                <ul>
                    <li>
                        <a href="login/twitter" class="fa fa-twitter"></a>
                    </li>
                    <li>
                        <a href="login/google" class="fa fa-google"></a>
                    </li>
                    <li>
                        <a href="login/github" class="fa fa-github"></a>
                    <li>


                </ul>
            </div>
            <!--Social networks end-->

            <!-- Already user -->
            <div class="not-user">
                <label><h5 style="color:white"> Ya tenes cuenta? <a href="login">Logueate!</a></h5></label>
            </div>
            <!-- Already user end-->




        </form>

    </div>
</section>
@endsection