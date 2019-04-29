<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienvenido {{ $user->name }}</title>
</head>
<body>
        <h1>Usuario #{{ $user->id }}</h1>
        <p>Nombre del usuario: {{ $user->name }}</p>
        <!-- Aca deberia tener todas las listas donde puede modificar, borrar, agregar, etc-->

        <p>
            <a href="{{ route('users.index') }}">Regresar al listado de usuarios</a>
        </p>



</body>
</html>
