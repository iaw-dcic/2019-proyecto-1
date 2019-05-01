<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">



    {{--  boostrap y datatable con el stylo de boostrap  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

    <!--Boostrap core CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.css" integrity="sha256-CNwnGWPO03a1kOlAsGaH5g8P3dFaqFqqGFV/1nkX5OU=" crossorigin="anonymous" />

    <title>Crear Usuario</title>
</head>
<body>
        <nav class="navbar navbar-dark bg-primary">
                <a class="navbar-brand" href="#">Listas de Usuarios</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02"
                aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                  <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                      <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('users.create') }}">Registrarse</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " href="#" tabindex="-1" aria-disabled="true">Ingresar</a>
                    </li>
                  </ul>

                </div>
        </nav>

    <div class="card">
        <h4 class="card-header"> Ingresar Equipo </h4>
        <div class="card-body">
                        <!--Laravel pasa automaticamente la variable errors a la vista-->
                @if ($errors->any())
                <div class="alert alert-danger">
                        <h6>Por favor corrige los siguientes errores debajo:</h6>
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>
                                {{ $error}}
                            </li>
                            @endforeach
                        </ul>
                </div>
            @endif

            <form method="POST" action="{{ url('usuarios/crearItem') }}">
                {!! csrf_field() !!} <!--Laravel nos protoge para evitar que un sitio malicioso envia solicitudes post a nuestra app pidiendo este token-->

                <!--Uso Boostrap-->
                <div class="form-group">
                        <!-- Label usa el id del input --> <!-- el campo name es el que usa el metodo post en el controlador para crear el usuario -->
                        <label for="nombre_club">Nombre del Club:</label>
                        <input type="text" name="nombre_club"  class="form-control" id="nombre_club" placeholder="Juan Perez" value="{{ old('name') }}">
                </div>
                <div>
                        <label for="nombre_estadio">Estadio:</label>
                        <input type="text" name="nombre_estadio"  class="form-control" id="nombre_estadio" placeholder="juanperez@example.com" value="{{ old('email') }}">
                </div>
                <div>
                        <label for="capacidad_estadio">Capacidad:</label>
                        <input type="number" class="form-control" name="capacidad_estadio" id="capacidad_estadio" placeholder="Mayor a 6 caracteres" ><br>
                </div>
                <div>


                        <label for="pais">Pais:</label>
                        <input type="text" class="form-control" name="pais" id="pais" placeholder="Mayor a 6 caracteres" >
                        @foreach ($lists as $list)
                           {{  $list_id = $list->id}}

                        @endforeach

                        <label for="list_id"></label>
                        <input type="hidden" class="form-control" name="list_id" id="list_id" placeholder="Mayor a 6 caracteres" value="list_id"><br>
                </div class="form-control">
                        <button type="submit" class = "btn btn-primary">Guardar Equipo</button>
                        <a  class = "btn btn-primary" href="{route(users.index)}">Finalizar Lista</a>

                </div>

            </form>
                    </div>
              </div>

              <!--Boostrap core JavaScript
        =============================================================-->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <script src=" https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src=" https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src=" https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

        <script>
                $(document).ready(function() {
                  $('#listas').DataTable();
                } );
            </script>




</body>
</html>
