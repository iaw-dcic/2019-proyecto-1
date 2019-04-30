<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--Boostrap core CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.css" integrity="sha256-CNwnGWPO03a1kOlAsGaH5g8P3dFaqFqqGFV/1nkX5OU=" crossorigin="anonymous" />

    <title>Cervezas Artesanales</title>
</head>
<body>
    <h1> Usuarios </h1>
    <br>
    @if($users->isNotEmpty())
        <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo electrónico</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                        <!-- Foreach(array as $value){
                            Code to be executed;
                         }-->

                  @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>

                            <form action="{{ route('users.destroy',$user) }}" method="POST">

                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <!--En cada ciclo se va a crear un enlace a cada usuario en cuestion.-->
                                <!--Utilizo nombramiento de rutas, como primer argumento pasa el nombre de la ruta-->
                                <a href="{{ route('users.show', $user)}}" class = "btn btn-link"><span class="oi oi-eye"></span> </a>
                                <a href="{{ route('users.edit', $user)}}" class = "btn btn-link"><span class="oi oi-pencil"></span></a>
                                <button type="submit" class="btn btn-link"class = "btn btn-link"> <span class="oi oi-trash"></span></button>
                            </form>
                                </td>
                    </tr>
                  @endforeach


                </tbody>
        </table>

    @else
        <p>No hay usuarios registrados</p>
    @endif

    <a href="{{ route('users.create') }}"> Registrarse</a>





    <!--Boostrap core JavaScript
        =============================================================-->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>
</html>
