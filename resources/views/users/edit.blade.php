<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Configuracion de usuario</title>
</head>
<body>
    <h1>Editar</h1>
    <!--Laravel pasa automaticamente la variable errors a la vista-->
    @if ($errors->any())
    <div class="alert alert-danger">
            <h4>Por favor corrige los siguientes errores debajo:</h4>
            @if ($errors->has('name'))
                 <p>{{ $errors->first('name') }}</p>
            @endif
            @if ($errors->has('email'))
                 <p>{{ $errors->first('email') }}</p>
            @endif
    </div>

    @endif

    <form method="POST" action="{{ url("usuarios/{$user->id}") }}">
        {{ method_field('PUT') }} <!--Paso el metodo correcto-->
        {!! csrf_field() !!} <!--Laravel nos protoge para evitar que un sitio malicioso envia solicitudes post a nuestra app pidiendo este token-->

        <!-- Label usa el id del input --> <!-- el campo name es el que usa el metodo post en el controlador para crear el usuario -->
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" placeholder="Juan Perez" value="{{ old('name', $user->name) }}"><br>


        <label for="email">Email:</label>
        <input type="email" name="email" id="email" placeholder="juanperez@example.com" value="{{ old('email', $user->email) }}"><br>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" placeholder="Mayor a 6 caracteres" ><br>

        <button type="submit">Actualizar usuario</button>

    </form>
</body>
</html>
