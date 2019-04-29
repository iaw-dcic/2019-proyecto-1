<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Usuario</title>
</head>
<body>
    <h1>Crear Usuario</h1>

    <form method="POST" action="{{ url('usuarios/crear') }}">
        {!! csrf_field() !!} <!--Laravel nos protoge para evitar que un sitio malicioso envia solicitudes post a nuestra app pidiendo este token-->

        <!-- Label usa el id del input --> <!-- el campo name es el que usa el metodo post en el controlador para crear el usuario -->
        <label for="name">Nombre:</label><input type="text" name="name" id="name" placeholder="Juan Perez"><br>
        <label for="email">Email:</label> <input type="email" name="email" id="email" placeholder="juanperez@example.com"><br>
        <label for="password">Contraseña:</label><input type="password" name="password" id="password" placeholder="Mayor a 6 caracteres"><br>
        <button type="submit">Crear usuario</button>

    </form>
</body>
</html>
