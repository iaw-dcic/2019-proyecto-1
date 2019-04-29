<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cervezas Artesanales</title>
</head>
<body>
    <h1> Usuarios </h1>
    <br>
    <a href="{{ route('users.create') }}"> Registrarse</a>
    <!-- Foreach(array as $value){
            Code to be executed;
    }-->
    @if (!@empty($users))
        <ul>
            @foreach ($users as $user)
                <li>
                    {{ $user->name }},({{  $user->email}})
                    <!--En cada ciclo se va a crear un enlace a cada usuario en cuestion.-->
                    <!--Utilizo nombramiento de rutas, como primer argumento pasa el nombre de la ruta-->
                    <a href="{{ route('users.show', ['id' => $user->id])}}"> Ver detalles </a>
                </li>
            @endforeach
        </ul>
    @else
        <p> No hay usuarios registrados.</p>
    @endif


</body>
</html>
