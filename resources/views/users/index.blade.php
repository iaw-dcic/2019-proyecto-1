@extends('main')

@section('title','MyMusic: Usuarios')

@section('content')

    <br> <br>
    <h1> Usuarios: </h1>

    <table class="table table-striped">
        <head>
            <th style="font-size:20px">Nombre Usuario</th>
            <th>Cantidad de listas</th>
            <th>Email</th>
            <th>Ciudad</th>
        </head>

        <body>
            @foreach($users as $user)
                <tr>
                    <td style="font-size:20px"> <a href="{{route('listas.index')}}">{{ $user->name }} </a></td>
                    
                    <!-- cantidad de listas que posee -->
                    <td>{{ \App\Lista::where('user_id',$user->id)->count() }}</td>
                    
                    <td>{{ $user->email }}</td>
                    
                    @if($user->ciudad == 'vacio')
                        <td>Sin Especificar</td>
                    @else
                        <td>{{ $user->ciudad }}</td>
                    @endif
                    
                    
                    <!-- BOTONES  -->
                    <td>
                        <!--  boton de editar -->
                        <a href="/users/{{$user->id}}/edit" class="btn btn-warning">
                            <img src="https://img.icons8.com/material/16/000000/edit.png">
                        </a>
                        
                        <!-- boton de borrar  
                        Para borrar no puedo crear una vista porque en la url se veria el id y la ruta que desde otra pagina
                        se puede falsificar (problema de seguridad), por lo tanto uso un formulario con un boton que me 
                        llame al metodo destroy del controlador
                        -->
                    <form method="POST" action="/users/{{$user->id}}">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}


                            <button class="btn btn-danger" onclick="return confirm('¿Seguro que quieres eliminarlo?')">
                                    <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
                                    <img src="https://img.icons8.com/material/16/000000/trash.png">
                            </button>
                        </form>
                    </td>
                </tr>

            @endforeach
        </body>

    </table>
    <!--   renderizo para tener la paginacion con render() -->
    {!! $users->render() !!}

    <br><br>
@endsection