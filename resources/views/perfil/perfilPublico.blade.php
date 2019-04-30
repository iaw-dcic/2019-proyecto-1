@extends('generales.layout')

@section('pageTitle', 'Perfil Usuario')

@section('estilos')
    <link rel='stylesheet' href='/css/perfil/miPerfil.css'>
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
  
    <div class="panelInformacion">
         <h1 id="informacionUsuario">
            Listas Compartidas
        </h1>
        <div class="container">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Series agregadas</th>
                </tr>
            </thead>
            <tbody>
                 @foreach($lista as $listas)
                <tr>
                    @if ($listas->publica== "Si")
                        <td>{{ $listas->nombre_lista}}</td>
                        @foreach($listas->seriesAsociadas as $series)    
                                <td>{{ $series->nombre}}</td>
                        @endforeach
                    @endif
                @endforeach
                </tr>
            </tbody>
        </table>

        <a href="{{ url('/') }}"><button class="botonGuardar" type="button">Volver</button></a>
    </div>
@stop