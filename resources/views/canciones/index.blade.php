@extends('main')

@section('title','Lista de Canciones')

@section('content')

<a href="{{ action('CancionesController@create',18) }}" class="btn btn-primary">Agregar Cancion</a><br>

<br>
<table class="table table-striped">
    <head>
        <th>Nombre Cancion</th>
        <th>Duracion</th>
        <th>Album</th>
        <th>Autor</th>
    </head>

    <body>
        @foreach($canciones as $cancion)
            <tr>
                <td> {{ $cancion->id }}</td>
                <td> {{ $cancion->nombre }}</td>
                <td>{{ $cancion->autor }}</td>
                <td>{{ $cancion->duracion }}</td>
                <td>{{ $cancion->album }}</td>
                
                <td>
                    <!--  boton de editar -->
                    <a href="/canciones/{{$cancion->id}}/edit" class="btn btn-warning"></a>
                    
                    <!-- boton de borrar  
                    Para borrar no puedo crear una vista porque en la url se veria el id y la ruta que desde otra pagina
                    se puede falsificar (problema de seguridad), por lo tanto uso un formulario con un boton que me 
                    llame al metodo destroy del controlador
                    -->
                <form method="POST" action="/canciones/{{$cancion->id}}">
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
{!! $canciones->render() !!}
@endsection