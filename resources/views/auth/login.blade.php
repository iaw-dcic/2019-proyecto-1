@extends('layouts.app')

@section('agregadoscss')
<link href="{{ asset('css/login.css') }}" rel="stylesheet">
@endsection

@section('sectioncontent')
<section id="hero">
    <div class="hero-container">
        <div class="text-center w-50 p-3">
            <form class="form-login" action="{{ route('login') }}" method="post">
                @csrf
                <img class="mb-4" src="/images/loginicon.png" alt="" width="100" height="100">

                <h2>Ingrese sus datos</h2>
                <label for="inputEmail" class="sr-only">Correo Electrónico</label>
                <div>
                    <input type="email" name="email" id="inputEmail" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Correo Electrónico" required autofocus>
                    @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>

                <label for="inputPassword" class="sr-only">Contraseña</label>
                <div>
                    <input type="password" name="password" id="inputPassword" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Contraseña" required>
                    @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="recordarme"> Recordarme
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar Sesión</button>
            </form>
        </div>

    </div>
</section><!-- #hero -->
@endsection