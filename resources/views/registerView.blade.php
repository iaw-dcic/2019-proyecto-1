@extends('layout')

@section('head')
	@parent
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link href="{{asset('css/loginstyle.css')}}" rel="stylesheet" />
@endsection

@section('content')
	@if($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error}}</li>
				@endforeach
			</ul>
		</div>
	@endif
	<div class="d-flex justify-content-center h-100">
		<div class="card h-100	">
			<div class="card-header">
				<h3>Registrarme</h3>
			</div>
			<div class="card-body">
				<form method="POST" action="{{url('user/create')}}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" name="name" class="form-control" placeholder="nombre" value="{{old('name')}}">
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-envelope-open"></i></span>
						</div>
						<input type="email" name="email" class="form-control" placeholder="email" value="{{old('email')}}">
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-lock"></i></span>
						</div>
						<input type="password" name="password" class="form-control" placeholder="contraseña">
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-lock"></i></span>
						</div>
						<input type="password" name="repeat_password" class="form-control" placeholder="repetir contraseña">
					</div>
					<div class="form-group">
						<input type="submit" value="Registrarme" class="btn btn-primary btn-lg btn-block login-button">
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection