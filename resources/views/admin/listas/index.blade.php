@extends('admin.template.main')

@section('title','Lista de Canciones')

@section('content')
    <table class="table table-striped">
        <head>
            <th>ID</th>
            <th>Nombre</th>
            <th>Cantidad Canciones</th>
        </head>

        <body>
            @foreach($listas as $lista)
                <tr>
                    <td>{{ $lista->id }}</td>
                    <td>{{ $lista->name }}</td>
                    <td>{{ $lista->cantidad_canciones }}</td>
                    <td>
                        <!--  boton de editar -->
                        <a href="/admin/listas/{{$lista->id}}/edit" class="btn btn-warning"></a>
                        
                        <!-- boton de borrar  
                        Para borrar no puedo crear una vista porque en la url se veria el id y la ruta que desde otra pagina
                        se puede falsificar (problema de seguridad), por lo tanto uso un formulario con un boton que me 
                        llame al metodo destroy del controlador
                        -->
                    <form method="POST" action="/admin/listas/{{$lista->id}}">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}


                            <button  class="btn btn-danger"></button>
                        </form>
                    </td>
                </tr>

            @endforeach
        </body>

    </table>
    <!--   renderizo para tener la paginacion con render() -->
    {!! $listas->render() !!}

@endsection