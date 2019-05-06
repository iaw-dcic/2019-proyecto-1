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



    {{--  boostrap y datatable con el stylo de boostrap  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

    <title>Futboleros</title>
</head>
<body>
    <div>
        <ul class="nav nav-pills nav-fill">
                <li class="nav-item">
                  <a class="nav-link active" data-ajax="false" href="{{ route('users.index') }}">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link"  data-ajax="false" href="{{ route('users.create') }}">Crear Lista</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link"  data-ajax="false" href="{{ route('users.showListas') }}">Mis Listas</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-ajax="false"href="{{ route('logout') }}">Salir</a>
                </li>
                <li>
            {{-- <a href="{{ route('users.show',$user) }}" data-ajax="false">usuario</a> --}}
                </li>

        </ul>
    </div>

    @if($lists->isNotEmpty())
         <div class="list-group">
             @foreach ($lists as $list)

                <div data-role=collapsible>
                <h4>{{$list->name}} creada por {{ App\User::where('id',$list->user_id)->first()->name}}</h4>
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





</body>
</html>
