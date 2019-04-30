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

			<!-- Social media icons -->
			<div class="{{$fadeIn}} {{$first}}">
				<a href="/auth/facebook" class="fa fa-facebook"></a>
				<a href="#" class="fa fa-twitter"></a>
				<a href="#" class="fa fa-google"></a>
			</div>

			<!-- Sign Up Form -->
			<form method="POST" action="{{ route('register') }}">
				@csrf

				<input id="username" placeholder="Username" type="text" class="{{$fadeIn}} {{$second}} {{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>
				@if ($errors->has('username'))
					<div class="error-label invalid-feedback" role="alert">
						<strong>{{ $errors->first('userame') }}</strong>
					</div>
				@endif

				<input id="email" type="text" placeholder="E-Mail" class="{{$fadeIn}} {{$second}} {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
				@if ($errors->has('email'))
					<div class="error-label invalid-feedback" role="alert">
						<strong>{{ $errors->first('email') }}</strong>
					</div>
				@endif

				<input id="password" type="password" placeholder="Password" class="{{$fadeIn}} {{$second}} {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

				@if ($errors->has('password'))
					<div class="error-label invalid-feedback " role="alert">
						<strong>{{ $errors->first('password') }}</strong>
					</div>
				@endif

				<input id="password-confirm" type="password" placeholder="Confirm password" class="{{$fadeIn}} {{$second}} " name="password_confirmation" required>

				<input type="submit" class="{{$fadeIn}} {{$third}}" value="{{ __('Register') }}">
			</form>
		</div>
	</div>
</div>
@endsection
