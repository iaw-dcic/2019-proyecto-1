@extends('layout')

@section('scripts')
<title>Ingresar</title>

<!-- Font Icon -->
<link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

<!-- css -->
<link rel="stylesheet" href="css/style.css">

<!-- JS -->
<script src="jquery/jquery.min.js"></script>
@endsection

@section('content')
<div class="links">
    <a href="/">Home</a>
</div>
@endsection

@section('content2')
<br>
<div class="main">
    <!-- Sing in  Form -->
    <section class="signin">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                    <a href="/registrar" class="signup-image-link">Crear una cuenta</a>
                </div>

                <div class="signin-form">
                    <h2 class="form-title">Ingresar</h2>
                    <form method="POST" class="register-form" id="login-form">
                        <div class="form-group">
                            <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="your_name" id="your_name" placeholder="Usuario" />
                        </div>
                        <div class="form-group">
                            <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="your_pass" id="your_pass" placeholder="Contraseña" />
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                            <label for="remember-me" class="label-agree-term"><span><span></span></span>Recordar
                                contraseña</label>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="Ingresar" />
                        </div>
                    </form>
                    <div class="social-login">
                        <span class="social-label">O ingresar con</span>
                        <ul class="socials">
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                            <li><a href="#"><i class="display-flex-center zmdi g-signin2"></i></a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
</div>
@endsection