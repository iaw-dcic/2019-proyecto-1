@extends('main')

@section('title','MyMusic: Listas canciones')

@section('content')

    <br>
    <!-- boton agregar lista -->
    <a href="{{ action('ListasController@create') }}" class="btn btn-primary">Agregar Lista</a><br>

    <br>
    <table class="table table-striped">
        <head>
            <th style="font-size:20px">Nombre Lista</th>
            <th>Descripción</th>
            <th>Visibilidad</th>
            <th>Propietario</th>
        </head>

        <body>
            @foreach($listas as $lista)
                <tr>
                    <!--   le paso el id de la lista para saber a donde voy a agregar canciones    -->
                    <td style="font-size:20px"> <a href="{{route('canciones.index',['lista'=>$lista->id])}}">{{ $lista->nombre }} </a></td>
                    
                    <td>{{ $lista->descripcion }}</td>

                    @if($lista->visible ===0 )
                        <td>Privada</td>
                    @else                            
                        <td>Pública</td>                       
                    @endif

                    <!-- muestro el nombre del propietario de la lista   --> 
                    <td>   {{ \App\User::find($lista->user_id)->name  }}   </td>


                     <!--  BOTONES -->
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