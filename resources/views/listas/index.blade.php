@extends('main')

@section('title','Lista de Canciones')

@section('content')

    <a href="{{ action('ListasController@create') }}" class="btn btn-primary">Agregar Lista</a><br>

    <table class="table table-striped">
        <head>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripcion</th>
        </head>

        <body>
            @foreach($listas as $lista)
                <tr>
                    <td> {{ $lista->id }}</td>
                    <td> <a href="{{route('canciones.index',$lista->id)}}">{{ $lista->nombre }} </a></td>
                    <td>{{ $lista->descripcion }}</td>
                    <td>
                        <!--  boton de editar -->
                        <a href="/listas/{{$lista->id}}/edit" class="btn btn-warning"></a>
                        
                        <!-- boton de borrar  
                        Para borrar no puedo crear una vista porque en la url se veria el id y la ruta que desde otra pagina
                        se puede falsificar (problema de seguridad), por lo tanto uso un formulario con un boton que me 
                        llame al metodo destroy del controlador
                        -->
                    <form method="POST" action="/listas/{{$lista->id}}">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}


                            <button  class="btn btn-danger" onclick="return confirm('¿Seguro que quieres eliminarla?')">
                                
                                <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
                                </button>
                        </form>
                    </td>
                </tr>

            @endforeach
        </body>

    </table>
    <!--   renderizo para tener la paginacion con render() -->
    {!! $listas->render() !!}



@endsection