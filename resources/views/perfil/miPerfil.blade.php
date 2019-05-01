@extends('generales.layout')

@section('pageTitle', 'Mi Perfil')

@section('estilos')
    <link rel='stylesheet' href='/css/perfil/miPerfil.css'>
    <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
@stop

@section('javascripts')
@stop

@section('body')
    <div class="panelInformacion">
        <h1 id="informacionUsuario">
            <b>Cuenta</b>
        </h1>
        <div>
            <h2 id="informacionUsuario">
                <b>Nombre Usuario:</b> {{ Auth::user()->name }}
            </h2>
        </div>
        <div>
            <h2 id="informacionUsuario">
                <b>E-mail:</b> {{ Auth::user()->email }}
            </h2>
        </div>
        <a class="btn-sm btn-info botoninput" href="/editarPerfil"><i class="fas fa-user-edit"> Editar Perfil</i></a>
    </div>

    <br>

    <div class="panelSeries">
        <h1 id="informacionUsuario">
            <b>Series guardadas</b>
        </h1>
    </div>

    <div class="container">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Temporadas</th>
                    <th scope="col">Puntuacion</th>
                    <th scope="col">Comentarios</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($serie as $series)
                <tr>
                    <td>{{ $series->nombre}}</td>
                    <td>{{ $series->temporadas}}</td>
                    <td>{{ $series->puntuacion}}</td>
                    <td>{{ $series->comentarios}}</td>
                    <td>
                        <a class="btn-sm btn-info botoninput" href="{{route('serie.edit', $series->id) }}"><i class="far fa-edit"></i></a>
                        
                        <form method="POST" action="{{route('serie.destroy',$series->id)}}">
                            {{csrf_field()}}
                            @method('DELETE')      
                            <button type="submit" id="botonEliminar" class="btn-sm btn-danger mt-3 botoninput"  onclick="return confirm('¿Quiere borrar la serie?')"><i class="far fa-trash-alt"></i></button>
                        </form>

                        <a class="btn-sm btn-info botoninput" href="/asociarLista/{{$series->id}}"><i class="fas fa-plus"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
 
        </table>
</div>
    <div id="panelAgregar">
        <a class="botonagregar" type="button" href="{{route('serie.create')}}">Agregar serie</a>
    </div>

    <div class="container panelSeries">
        <h1 id="informacionUsuario">
            Listas Creadas
        </h1>
        <hr>
        @foreach($lista as $listas)
            <div class="panelTablaYBotones">
                <div class="panelTabla">
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">{{ $listas->nombre_lista}}</th>
                            </tr>
                        </thead>
                        @foreach($listas->seriesAsociadas as $series)   
                        <tbody>
                            <tr>
                                <td>{{ $series->nombre}}</td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
                <div class="panelBotones">
                    <h2>¿Es publica? {{ $listas->publica}}</h2>
                    <a class="btn-sm btn-info botoninput" href="{{route('listas.edit', $listas->id) }}"><i class="far fa-edit"></i></a>
                    <form method="POST" action="{{route('listas.destroy',$listas->id)}}">
                        {{csrf_field()}}
                        @method('DELETE')      
                        <button type="submit" id="botonEliminar" class="btn-sm btn-danger mt-3"  onclick="return confirm('¿Quiere borrar la lista?')"><i class="far fa-trash-alt"></i></button>
                    </form>
                </div>
            </div>
            <hr>
        @endforeach
            <a class="botonagregar" type="button" href="{{route('listas.create')}}">Crear Lista</a>
    </div>
@stop