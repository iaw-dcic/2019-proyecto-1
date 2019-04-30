@extends('generales.layout')

@section('pageTitle', 'Mi Perfil')

@section('estilos')
    <link rel='stylesheet' href='/css/miPerfil.css'>
@stop

@section('javascripts')
@stop

@section('body')
    <div class="panelInformacion">
        <h1 id="informacionUsuario">
            Cuenta
        </h1>

        <h2 id="informacionUsuario">
            Nombre Usuario: {{ Auth::user()->name }}
        </h2>

        <h3 id="informacionUsuario">
            E-mail: {{ Auth::user()->email }}
        </h3>

        <a class="btn-sm btn-info botoninput" href="/editarPerfil"><i class="fas fa-user-edit"></i></a>

    </div>
  
    <div class="panelInformacion">
         <h1 id="listas">
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
                    <td>{{ $listas->nombre_lista}}</td>
                    @foreach($serie as $series)
                        @if($listas->id == $series->id_lista)
                            <td>{{ $series->nombre}}</td>
                        @endif
                    @endforeach
                @endforeach
                </tr>
            </tbody>
        </table>

    </div>
@stop