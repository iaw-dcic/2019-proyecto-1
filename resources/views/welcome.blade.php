<!DOCTYPE html>

<html>

  <head> 
      <link rel="shortcut icon" href="/images/logo 16.ico">
      <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="/css/config-bootstrap.css">
      <link rel="stylesheet" type="text/css" href="/css/home-bootstrap.css">

      <title> Best Goals! </title>

  </head>

  <body class="text-center">
      <ul>
			  <li><a href="/">Best Goals!</a></li>
		  </ul>
      <form class="form-signin" >
      <img class="mb-4" src="/images/logo 150.png" height="150">
        <h1 class="h3 mb-3 font-weight-normal">Iniciar sesión</h1>
        <label for="inputEmail" class="sr-only">Correo electrónico</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Correo electrónico" >
        <label for="inputPassword" class="sr-only">Ingrese contraseña</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" >
        <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="Recuerdame";> Recuerdame
          </label>
        </div>
        <button id=btn-lg class="btn btn-lg btn-primary btn-block" type="submit" href="/home">Ingresar</button>
        <p id=sinCuenta>No tengo cuenta <a href="/signup">REGISTRARSE</a></p>
        <p id=anonimo><a href="/public">INGRESAR</a> como anónimo</p>

        <a class="active" href="/home">Ejemplo de ingresar como usuario</a>
        
        <p class="mt-5 mb-3 text-muted">© IAW - 2019</p>
      </form>

  </body>
</html>