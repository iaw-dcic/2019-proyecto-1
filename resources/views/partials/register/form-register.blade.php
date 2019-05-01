<div class="signup d-flex justify-content-center">
    <form method="POST" action="{{ route('register') }}" class="container-fluid">
        @csrf
        <div class="row no-gutters">
            <div class="col-12 foto-camara d-flex justify-content-center">
                <i class="fas fa-camera-retro"></i>
            </div>
            <div class="col-12">
                <input type="text" class="form-control" id="validationServerUsername" placeholder="Nombre de usuario" name="username" required>
                <div class="valid-feedback">Usuario disponible.</div>
                <div class="invalid-feedback">Usuario inválido</div>
            </div>
            <div class="col-12">
                <input type="text" class="form-control" id="validationFirstName" placeholder="Nombre" name="name" required>
            </div>
            <div class="col-12">
                <input type="text" class="form-control" id="validationServerEmail" placeholder="E-mail" name="email" required>
                <div class="valid-feedback">E-mail disponible.</div>
                <div class="invalid-feedback">E-mail inválido.</div>
            </div>
            <div class="col-12">
                <input type="password" class="form-control" placeholder="Contraseña" id="validationPassword" name="password" required>
                <div class="valid-feedback">Contraseña válida.</div>
                <div class="invalid-feedback">Contraseña inválida, debe tener entre 6 y 24 caracteres.</div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit" id="btn_signup">
                    <i class="fas fa-sign-in-alt"></i> Registrarse
                </button>
            </div>
            <div class="col-12">
                <a href="{{ route('social_auth', ['driver' => 'google']) }}" class="btn btn-github btn-lg btn-block">
                    Google <i class="fab fa-google"></i>
                </a>
            </div>
        </div>
    </form>
</div>
