@extends('main')

@section('title','Lista: \''.$lista->nombre.'\'')

@section('content')

    <br>
    <!--   Btn agregar Cancion  -->
                                    <!--   lista  -->
    <a href="{{ route('canciones.create',['lista'=>$lista]) }}" class="btn btn-primary">Agregar Canción</a><br>
    
    <br>
    <h1> {{$lista->nombre}}: </h1>

    <br>
    <table class="table table-striped">
        <head>
            <th>Nombre Canción</th>
            <th>Album</th>
            <th>Autor</th>
            <th>Duración</th>
            <th>Fecha Lanzamiento</th>
            <th>Permisos</th>
        </head>

        <body>
            @foreach($canciones as $cancion)
                <tr>
                    <td> {{ $cancion->nombre }}</td>
                    <td>{{ $cancion->album }}</td>
                    <td>{{ $cancion->autor }}</td>
                    <td>{{ $cancion->duracion }}</td>
                    
                    @if( $cancion->fecha_lanzamiento === "1111-11-11")
                        <td>Sin especificar</td>
                    @else
                        <td>{{ $cancion->fecha_lanzamiento }}</td>
                    @endif


                    <!-- BOTONES -->


                    @if($lista->user_id == Auth::user()->id)

                    <td>
                            <!--  boton de editar -->
                        <a href="/listas/canciones/{{$cancion->id}}/edit" class="btn btn-warning">
                            <img src="https://img.icons8.com/material/16/000000/edit.png">
                        </a>
                            
                            <!-- boton de borrar  
                            Para borrar no puedo crear una vista porque en la url se veria el id y la ruta que desde otra pagina
                            se puede falsificar (problema de seguridad), por lo tanto uso un formulario con un boton que me 
                            llame al metodo destroy del controlador
                            -->
                        <form method="POST" action="/listas/canciones/{{$cancion->id}}">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}


                                <button  class="btn btn-danger" onclick="return confirm('¿Seguro que quieres eliminarla?')">
                                    <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
                                    <img src="https://img.icons8.com/material/16/000000/trash.png">
                                </button>
                        </form>
                    </td>

                    @endif
                </tr>

            @endforeach
        </body>

    </table>
    <!--   renderizo para tener la paginacion con render() -->
    {!! $canciones->render() !!}

    <br><br>
@endsection