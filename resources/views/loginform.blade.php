<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="pagina web para iaw uns">
<title>Bootstrap Sign in Form with Circular Social Buttons</title>


 
  <link href=" css/login.css" rel="stylesheet">    
 
</head>
<body>
<div class="signin-form">
    <form action="/examples/actions/confirmation.php" method="post">
		<h2>Inicia Sesión</h2>
        <p class="hint-text">Inicia sesión con tus redes sociales</p>
		<div class="social-btn text-center">
			<a href="{{ route('social.auth', 'facebook') }}" class="btn btn-primary btn-lg" title="Facebook"><i class="fa fa-facebook"></i></a>
			<a href="#" class="btn btn-info btn-lg" title="Twitter"><i class="fa fa-twitter"></i></a>
			<a href="#" class="btn btn-danger btn-lg" title="Google"><i class="fa fa-google"></i></a>
		</div>
        <div class="or-seperator"><b>o</b></div>
        <div class="form-group">
        <label   >Nombre 
        	<input type="text" class="form-control input-lg" name="nombre" placeholder=" " required="required">
            </label>
        </div>
        <div class="form-group">
        <label   >Apellido 
        	<input type="text" class="form-control input-lg" name="apellido" placeholder=" " required="required">
        </label>
         </div>
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
    <div class="text-center small">No tienes cuenta? <a href="#">Crea tu cuenta</a></div>
</div>
</body>

<script defer src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script defer src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

<link defer  href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
<link   defer rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link  defer  rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</html>                            

