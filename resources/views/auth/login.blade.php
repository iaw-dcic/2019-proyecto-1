@extends('layouts.app')

@section('stylesheets')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/social_media_icons.css">
@endsection

@section('body')
<?php
	$fadeInDown = ''; $fadeIn = ''; $first = ''; $second = ''; $third = ''; $fourth = '';
	if(!$errors->any()){
		$fadeInDown = 'fadeInDown'; $fadeIn = 'fadeIn'; $first = 'first'; $second = 'second'; $third = 'third'; $fourth = 'fourth';
	}
?>
<div class="container">
    <div class="wrapper {{ $fadeInDown }}">
		<div id="formContent">

			<!-- Icon -->
			<div class="{{ $fadeIn }} {{ $first }}">
					<span class="glyphicon glyphicon-user"></span>
			</div>

			<!-- Social media icons -->
			<div class="{{ $fadeIn }} {{ $second }}">
				<a href="#" class="fa fa-facebook"></a>
				<a href="#" class="fa fa-twitter"></a>
				<a href="#" class="fa fa-google"></a>
			</div>

			<!-- Login Form -->
			<form method="POST" action="{{ route('login') }}">
				@csrf
				<input id="email" type="text" placeholder="E-Mail" class="{{ $fadeIn }} {{ $third }} {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
				<br>
				@if ($errors->has('email'))
					<div class="{{ $fadeIn }} {{ $third }} error-label invalid-feedback" role="alert">
						<strong>{{ $errors->first('email') }}</strong>
					</div>
					<br>
				@endif
				<input id="password" type="password" placeholder="Password" class="{{ $fadeIn }} {{ $third }} password{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
				<br><!--password form-control-->
				@if ($errors->has('password'))
					<div class="{{ $fadeIn }} {{ $third }}error-label invalid-feedback" role="alert">
						<strong>{{ $errors->first('password') }}</strong>
					</div>
					<br>
				@endif
				<br>
				<input class="{{ $fadeIn }} {{ $fourth}} form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

				<label class="{{ $fadeIn }} {{ $fourth}} form-check-label" style="margin-top: 20px" for="remember">
					{{ __('Remember Me') }}
				</label>
				<br>
				<input type="submit" class="{{ $fadeIn }} {{ $fourth}}" value="Log In">

			</form>

			<!-- Remind Passowrd -->
			<div id="formFooter">
				<a class="underlineHover" href="#">Forgot Password?</a>
			</div>

		</div>

    </div>
</div>
@endsection
