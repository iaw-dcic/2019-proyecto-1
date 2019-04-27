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


<!-- Contact page -->
<!--<section class="contact-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Ingresar') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"
                                        required autofocus> @if ($errors->has('email'))
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
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old( 'remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                                        {{ __('Recordarme') }}
                                                    </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                                    {{ __('Ingresar') }}
                                    </button>
                                   
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('O ingresar con:') }}</label>
                                    <a href="{{ route('login', ['service' => 'github']) }}" class="btn btn-primary"> -->
<!--<a href="login/github" class="btn btn-primary">
    @include('partials._socialNetworks') 
                                        Github
                                    </a>  

                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                                        {{ __('Olvidé la contraseña') }}
                                    </a>
                                     @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>-->
<!--</section> -->

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
                <label> <i class="fa fa-envelope" aria-hidden="true"></i>Email *</label>
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"
                    required autofocus> @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span> @endif

            </div>

            <div class="form-style-agile">
                <label> <i class="fa fa-unlock-alt" aria-hidden="true"></i>Contraseña *</label>

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
                                          Recordarme
                                        </label>
                </div>
            </div>

            <label style="color:burlywood">Los campos marcados con un * son requeridos</label>

            <input type="submit" value="Ingresar">


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
                        <a href="#" class="fa fa-google"></a>
                    </li>
                    <li>
                        <a href="login/github" class="fa fa-github"></a>
                    <li>
                   
                 
                </ul>
            </div>
            <!--Social networks end-->

            <!-- Not user -->
                <h5 style="color:white"> Todavía no tenes cuenta? <a href="register">Registrate!</a></h5>
            <!-- Not user end -->
           


            


        </form>
    </div>
</section>
<!-- Contact page end-->
@endsection