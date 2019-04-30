@extends('main')

@section('title','MyMusic: Listas canciones')

@section('content')
    <br>
    <div>
        <!-- boton agregar lista -->
        <a href="{{ action('ListasController@create') }}" class="btn btn-primary col-12 col-md-4">Agregar Lista</a>

        <!-- boton para ver listas  privadas-->
        <a href="{{ action('ListasController@indexPriv') }}" class="btn btn-primary col-12 col-md-4 ml-0 ml-md-5">Ver Listas Privadas</a>

    </div>

    <br> <br>
    <h1> Listas Públicas: </h1>

    <br>
    <table class="table table-striped">
        <head>
            <th style="font-size:20px">Nombre Lista</th>
            <th>Descripción</th>
            <th>Visibilidad</th>
            <th>Cantidad Canciones</th>
            <th>Propietario</th>
            <th>Permisos</th>
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

                    <!-- cantidad de canciones que tiene la lista -->
                    <td>{{ \App\Cancion::where('lista_id',$lista->id)->count() }}</td>


                    <!-- muestro el nombre del propietario de la lista   --> 
                    @if( Auth::user()== null) 
                        <!-- si es otro user el dueño de la lista, muestro el nombre -->
                        <td>  <a href="{{route('users.index')}}"> {{ \App\User::find($lista->user_id)->name  }} </a></td>
                        
                        <td>
                            <a class="btn btn-success">
                                <img src="https://img.icons8.com/material/16/000000/visible.png">
                            </a>
                        </td>
                    @elseif( $lista->user_id != Auth::user()->id)
                        <!-- si es otro user el dueño de la lista, muestro el nombre -->
                        <td>  <a href="{{route('users.index')}}"> {{ \App\User::find($lista->user_id)->name  }} </a></td>
                        
                        <td>
                            <a class="btn btn-success">
                                <img src="https://img.icons8.com/material/16/000000/visible.png">
                            </a>
                        </td>
                    @else
                        <!-- si soy yo, muestro 'yo' y tengo permisos de edicion y borrado -->
                        <td>  <a href="{{route('users.index')}}"> Yo </a> 
                        </td>

                        <!--  BOTONES -->

                    <td>
                    
                        <!--  boton de editar -->
                        <a class="btn btn-warning"   href="/listas/{{$lista->id}}/edit">
                            <img src="https://img.icons8.com/material/16/000000/edit.png">
                        </a>
                        
                        <!-- boton de borrar  
                        Para borrar no puedo crear una vista porque en la url se veria el id y la ruta que desde otra pagina
                        se puede falsificar (problema de seguridad), por lo tanto uso un formulario con un boton que me 
                        llame al metodo destroy del controlador
                        -->
                        <form method="POST" action="/listas/{{$lista->id}}">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}


                            <button class="btn btn-danger" onclick="return confirm('¿Seguro que quieres eliminarla?')">
                                <span aria-hidden="true" class="glyphicon glyphicon-trash">
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
    {!! $listas->render() !!}

    <br><br>


@endsection