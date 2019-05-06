<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{--  jquery  --}}
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>


    {{-- boostrap --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">






    <title>Futboleros</title>
</head>
<body>

    <div>
        <ul class="nav nav-pills nav-fill">
                <li class="nav-item">
                  <a class="nav-link" data-ajax="false" href="{{ route('users.index') }}">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link"  data-ajax="false" href="{{ route('users.create') }}">Crear Lista</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active"  data-ajax="false" href="{{ route('users.showListas') }}">Mis Listas</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-ajax="false"href="{{ route('logout') }}">Salir</a>
                </li>

        </ul>
    </div>

    @if(Session::has('message'))
        <p class="alert alert-danger">{{ Session::get('message') }}</p>
    @endif

    @if($lists->isNotEmpty())
         <div class="list-group">
             @foreach ($lists as $list)

                <div data-role=collapsible>
                <td>
                <h4>{{$list->name}} creada el {{ $list->created_at}}
                </h4>
                <div data-role="controlgroup" data-type="horizontal" >
                                        <a href="{{ route('users.editLista', $list->id)}}" data-ajax="false" data-role="button" data-icon="forward"  style="border-radius: 15px;color:white; background:yellowgreen" >Editar</a>
                                        <a href="{{ route('users.destroy', $list->id)}}" data-ajax="false" data-role="button" data-icon="delete"  style="border-radius: 15px;color:white; background:tomato" >Eliminar</a>


                                        {{-- <form action="{{ route('users.destroy',$user) }}" method="POST">

                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <!--En cada ciclo se va a crear un enlace a cada usuario en cuestion.-->
                                                <!--Utilizo nombramiento de rutas, como primer argumento pasa el nombre de la ruta-->
                                                <a href="{{ route('users.show', $user)}}" class = "btn btn-link"><span class="oi oi-eye"></span> </a>
                                                <a href="{{ route('users.edit', $user)}}" class = "btn btn-link"><span class="oi oi-pencil"></span></a>
                                                <button type="submit" class="btn btn-link"class = "btn btn-link"> <span class="oi oi-trash"></span></button>
                                            </form> --}}


                </div>

                <table class="table table-sm table-dark table-hover bordered">
                        <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Club</th>
                        <th scope="col">Estadio</th>
                        <th scope="col">Capacidad</th>
                        <th scope="col">Pais</th>
                        </tr>
                        </thead>
                        @foreach($items as $item)
                            @if($item->list_id == $list->id)
                                 <tbody>
                                        <tr>
                                                <th scope="row"></th>
                                                <td>{{ $item->nombre_club }}</td>
                                                <td>{{ $item->nombre_estadio }}</td>
                                                <td>{{ $item->capacidad_estadio }}</td>
                                                <td>{{ $item->pais }}</td>
                                        </tr>
                                 </tbody>
                            @endif
                        @endforeach
                </table>
                </div>
            @endforeach
        </div>

     @else
        <p>No se han creado listas todavía</p>
    @endif




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
