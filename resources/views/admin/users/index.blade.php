@extends('admin.template.main')

@section('title','Lista de Usuarios')

@section('content')
    <table class="table table-striped">
        <head>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
        </head>

        <body>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <!--  boton de editar -->
                        <a href="/admin/users/{{$user->id}}/edit" class="btn btn-warning"></a>
                        <!-- boton de borrar  -->
                    <form method="POST">
                        {{ method_field('DELETE') }}

                        <button  class="btn btn-danger"></button>
                    </form>
                    </td>
                </tr>

            @endforeach
        </body>

    </table>
    <!--   renderizo para tener la paginacion con render() -->
    {!! $users->render() !!}

@endsection