@extends('layouts.app') 
@section('title',' | Login') 
@section('content')
@include('sweetalert::alert')


<!-- Page top section -->
<section class="page-top-section set-bg" data-setbg="img/page-top-bg/4.jpg">
    <div class="page-info">
        <h2>Ingresar</h2>
        <div class="site-breadcrumb">
            <a href="/">Inicio</a> /
            <span>Ingresar</span>
        </div>
    </div>
</section>
<!-- Page top end-->


<section class="custom-form">

    <!-- <div class="video-w3l" data-vide-bg="video/1"> -->
    <h3 style="color:bisque; text-align:center;margin-bottom:20px"> Ingresar </h3>

    <!-- content -->
    <div class="sub-main-w3">
        <form action="{{ route('login') }}" method="post">
            @csrf
            <!-- {{ csrf_field() }} -->
            <!-- Title -->
            <div class="form-style-agile">
                <label> <i class="fas fa-envelope-o" aria-hidden="true"></i>Email *</label>
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"
                    required autofocus> @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span> @endif

            </div>

            <div class="form-style-agile">
                <label> <i class="fas fa-envelope-o" aria-hidden="true"></i>Contraseña *</label>

                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                    required> @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span> @endif
            </div>

            <div class="form-style-agile">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old( 'remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                                            {{ __('Recordarme') }}
                                        </label>
                </div>
            </div>



            <!-- Social networks -->
            <div class="footer-social">
               <label for="email"> <h2>O ingresar con</h2> </label>
                <ul>
                    <li>
                        <a href="#" class="fa fa-facebook"></a>
                    </li>
                    <li>
                        <a href="login/twitter" class="fa fa-twitter"></a>
                    </li>
                    <li>
                        <a href="#" class="btn fa fa-google"></a>
                    </li>
                    <li>
                        <a href="login/github" class="fa fa-github"></a>
                    <li>
                   
                 
                </ul>
            </div>
            <!--Social networks end-->

           


            <!--<label style="color:burlywood">Los campos marcados con un * son requeridos</label> -->

            <input type="submit" value="Listo">

        </form>
    </div>
</section>
</section>
<!-- Contact page end-->
@endsection