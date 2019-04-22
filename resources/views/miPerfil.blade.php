@extends('layout')

@section('pageTitle', 'Mi Perfil')

@section('estilos')
    <link rel='stylesheet' href='css/miPerfil.css'>
@stop

@section('body')
    <div class="panelInformacion">
        <h1 id="informacionUsuario">
            Cuenta
        </h1>
    </div>


    <div class="panelSeries">
        <h1 id="seriesGuardadas">
            Series guardadas
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
                    <td><a class="btn btn-info" href="/editar/{{$series->id}}">Editar</a></td>
                </tr>
                @endforeach
            </tbody>
 
        </table>
        {{ $serie->links() }}
</div>

@auth
    <div id="panelDescripcion">
        <a class="botonABM" type="button" href="/agregar">Agregar serie</a>
        <a class="botonABM" type="button" href="/editar">Editar serie</a>
        <a class="botonABM" type="button" href="/eliminar">Eliminar serie</a>
        <a class="botonABM" type="button" href="/compartir">Compartir serie</a>
    </div>
@endauth


@stop