<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="pagina web para iaw uns">
<title>Login Recetas</title>


 
  <link href="{{ asset('css/login.css') }}" rel="stylesheet">    
 
</head>
<body>
    
 
<div class="container" id="caja">
<ul class="nav nav-tabs" role="tablist">
	<li class="{{ (Request::is('login') ? 'active' : '') }}"><a href="#new" role="tab" data-toggle="tab" class="big">Inicia Sesion</a></li>
	<li class="{{ (Request::is('crea') ? 'active' : '') }}"><a href="#crea" role="tab" data-toggle="tab" class="big">Crea tu cuenta</a></li>
 </ul>
<div class="tab-content">
	<div class="{{ (Request::is('login') ? 'tab-pane fade in active' : 'tab-pane fade') }}" id="new"><br>
	 
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
 
<div class="{{ (Request::is('crea') ? 'tab-pane fade in active' : 'tab-pane fade') }}" id="crea">
					<br>
					<fieldset>
						<div class="form-group"  >
                        <form accept-charset="UTF-8" role="form" method="POST" action="{{URL::to('/store')}}">
                        {{ csrf_field() }}
                                <label class="sr-only"> Nombre </label>
								<input name='nombre'class="form-control input-lg" placeholder="Nombre" type="text">
                            </div>
                            <div class="form-group">
                                <label class="sr-only"> Apellido </label>
								<input name='apellido'class="form-control input-lg" placeholder="Apellido" type="text">
							</div>
                            <div class="form-group">
                                <label class="sr-only"> email </label>
								<i class="glyphicon glyphicon-envelope"></i>
								<input name='email'class="form-control input-lg" placeholder="Email" type="email">
							</div>
					 
						 
                            <div class="form-group">
                                <i class="glyphicon glyphicon-lock"></i>
                                <label class="sr-only"> password </label>
								<input name='password'class="form-control input-lg" placeholder="Password" type="password">
							</div>
                        
                    
					</fieldset>
					<br><div class=" text-center">
                    <button class="btn btn-primary">Crear</button></div>
</form>
				</div>
			</div>
            <br>
           
</div>
</body>

<script defer src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script defer src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

<link defer  href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
<link   defer rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link  defer  rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</html> 