<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title> Inicio de Sesión </title>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">   
</head>
    <body>
    <div class="login-box">
    <img src="/Imagenes/avatar.jpg" class="avatar">
        <h1>Inicia Sesión aquí</h1>
        <!-- Agregar lógica al login-->
            <form action="Verificar_Login.php">
            <p>Nombre de Usuario</p>
            <input type="text" name="username" placeholder="Ingrese Nombre de Usuario" required>
            <p>Contraseña</p>
            <input type="password" name="password" placeholder="Ingrese Contraseña" required>
            <input type="submit" name="submit" value="Iniciar Sesión">
            <a href="#">Olvidaste la Contraseña?</a>    
            </form>
        
        </div>
    
    </body>
</html>