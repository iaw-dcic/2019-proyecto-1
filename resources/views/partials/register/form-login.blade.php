<div class="login d-flex justify-content-center">
    <form method="POST" action="{{ route('login') }}" class="container-fluid">
        @csrf
        <div class="row no-gutters">
            <div class="col-12 foto-camara d-flex justify-content-center">
                <i class="fas fa-camera-retro"></i>
            </div>
            <div class="col-12">
                <input id="validationEmail" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="E-mail" required autofocus>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="col-12">
                    <input id="validationPasswordLogin" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Contraseña" required>
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-12">
                <div class="invalid-feedback hide" id="invalid-email-pass">Usuario o contraseña inválidos. Intente nuevamente.</div>
                <button class="btn btn-primary" type="submit" id="btn_login">
                    <i class="fas fa-sign-in-alt"></i> Ingresar
                </button>
            </div>
            <div class="col-12">
                <a href="{{ route('social_auth', ['driver' => 'google']) }}" class="btn btn-google btn-lg btn-block">
                    Google <i class="fab fa-google"></i>
                </a>
            </div>
            @if (Route::has('password.request'))
                <div class="col-12 d-flex justify-content-center forgot">
                    <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
                </div>
            @endif
        </div>
    </form>
</div>
