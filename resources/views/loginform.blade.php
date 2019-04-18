<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="pagina web para iaw uns">
<title>Bootstrap Sign in Form with Circular Social Buttons</title>


 
  <link href="{{ asset('css/login.css') }}" rel="stylesheet">    
 
</head>
<body>
<div class="signin-form">
<ul class="nav nav-tabs" role="tablist">
	<li class="active"><a href="#new" role="tab" data-toggle="tab" class="big">Inicia Sesion</a></li>
	<li><a href="#crea" role="tab" data-toggle="tab" class="big">Crea tu cuenta</a></li>
 </ul>
<div class="tab-content">
	<div class="tab-pane fade in active" id="new"><br>
	
    <form action="/examples/actions/confirmation.php" method="post">
		<h2>Inicia Sesión</h2>
        <p class="hint-text">Inicia sesión con tus redes sociales</p>
		<div class="social-btn text-center">
			<a href="{{ route('social.auth', 'facebook') }}" class="btn btn-primary btn-lg" title="Facebook"><i class="fa fa-facebook"></i></a>
			<a href="{{ route('social.auth', 'twitter') }}" class="btn btn-info btn-lg" title="Twitter"><i class="fa fa-twitter"></i></a>
			<a href="{{ route('social.auth', 'google') }} " class="btn btn-danger btn-lg" title="Google"><i class="fa fa-google"></i></a>
		</div>
        <div class="or-seperator"><b>o</b></div>
     
        <div class="form-group">
        <label   >Usuario 
            <input type="text" class="form-control input-lg" name="usuario" placeholder=" " required="required">
        </label>
        </div>
		<div class="form-group">
        <label   >Contraseña
            <input type="password" class="form-control input-lg" name="contraseña" placeholder=" " required="required">
        </label>
        </div>  
        <div class="form-group">

            <button type="submit" class="btn btn-success btn-lg btn-block signup-btn">Inicia Sesión</button>
        </div>
        <div class="text-center small"><a href="#">Olvidaste tu contraseña ?</a></div>
    </form>
     
</div>
 
<div class="tab-pane fade" id="crea">
					<br>
					<fieldset>
						<div class="form-group">
							<div class="right-inner-addon">
								<i class="glyphicon glyphicon-envelope"></i>
								<input class="form-control input-lg" placeholder="Email Address" type="text">
							</div>
						</div>
						<div class="form-group">
							<div class="right-inner-addon">
								<i class="glyphicon glyphicon-lock"></i>
								<input class="form-control input-lg" placeholder="Password" type="password">
							</div>
						</div>
					</fieldset>
					<br><div class=" text-center">
					<button class="btn btn-primary">LOGIN</button></div>
				</div>
			</div>
			<br>
</body>

<script defer src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script defer src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

<link defer  href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
<link   defer rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link  defer  rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</html>                            

