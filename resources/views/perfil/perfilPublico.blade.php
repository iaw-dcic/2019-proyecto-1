@extends('generales.layout')

@section('pageTitle', 'Perfil Usuario')

@section('estilos')
    <link rel='stylesheet' href='/css/perfil/perfilPublico.css'>
    <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
@stop

@section('body')
    <div class="panelInformacion">
        <h1 id="informacionUsuario">
            Cuenta
        </h1>

        <h2 id="informacionUsuario">
            Nombre Usuario: {{$usuario->name}}
        </h2>

        <h3 id="informacionUsuario">
            E-mail: {{$usuario->email}}
        </h3>
    </div>

    <div class="container panelInformacion">
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
            </div>
            <hr>
        @endforeach
    </div>
    <div class="panelBoton">
        <a href="{{ url('/') }}"><button class="botonVolver" type="button">Volver</button></a>
    </div>
@stop