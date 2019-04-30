@extends('layouts.app') 
@section('title',' | Login') 
@section('content')

<!-- Page top section -->
<section class="page-top-section set-bg" data-setbg="img/page-top-bg/4.jpg">
    <div class="page-info">
        <h2>Inicar sesión</h2>
        <div class="site-breadcrumb">
            <a href="/">Inicio</a> /
            <span>Iniciar sesión</span>
        </div>
    </div>
</section>
<!-- Page top end-->


<section class="custom-form">

    <h3 style="color:bisque; text-align:center;margin-bottom:20px"> Ingresar </h3>

    <div class="sub-main-w3">
        <form method="post" action="{{route('login')}}">
            @csrf

            <!--Email -->
            <div class="form-style-agile">
                <label> <i class="fa fa-envelope" aria-hidden="true"></i>Email</label>
                <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"
                    required autofocus> @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span> @endif
            </div>



            <!-- Password -->
            <div class="form-style-agile">
                <label> <i class="fa fa-unlock-alt" aria-hidden="true"></i>Contraseña</label>
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                    required> @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span> @endif
            </div>

            <!-- Remember me -->
            <div class="form-style-agile">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old( 'remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                                Recordarme
                            </label>
                </div>
            </div>

              <!-- Login with social networks -->
              <div class="footer-social">
                    <label for="email"> <h2>O ingresar con:</h2> </label>
                     <ul>
                         <li>
                             <a href="#" class="fa fa-facebook"></a>
                         </li>
                         <li>
                             <a href="login/twitter" class="fa fa-twitter"></a>
                         </li>
                         <li>
                             <a href="#" class="fa fa-google"></a>
                         </li>
                         <li>
                             <a href="login/github" class="fa fa-github"></a>
                         <li>
                           
                     </ul>
                 </div>
                 <!--Social networks end-->
     
                 <!-- Not user -->
                 <div class="not-user">
                        <label><h5 style="color:white"> Todavía no tenes cuenta? <a href="register">Registrate!</a></h5></label>
                 </div>
                 <!-- Not user end -->

            <!-- Submit -->
            <input type="submit" value="Ingresar">


        </form>


    </div>
</section>
@endsection