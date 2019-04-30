@extends('generales.layout')

@section('pageTitle', 'Mi Perfil')

@section('estilos')
    <link rel='stylesheet' href='/css/miPerfil.css'>
    <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
@stop

@section('javascripts')
@stop

@section('body')
    <div class="panelInformacion">
            <h1 id="informacionUsuario">
                Cuenta
            </h1>
        <div class="form-row">
            <div class="form-group col-md-6">
              <h2 id="informacionUsuario">
                 Nombre Usuario: {{ Auth::user()->name }}
              </h2>
            </div>
            <div class="form-group col-md-6">
                 <a class="btn-sm btn-info botoninput" href="/editarPerfil"><i class="fas fa-user-edit"></i></a>
            </div>
        </div>

        <div class="form-group col-md-6">
            <h3 id="informacionUsuario">
                E-mail: {{ Auth::user()->email }}
            </h3>
        </div>
    </div>

    <div class="panelSeries">
        <h1 id="informacionUsuario">
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
                    <td>
                        <a class="btn-sm btn-info botoninput" href="{{route('serie.edit', $series->id) }}"><i class="far fa-edit"></i></a>
                        
                        <form method="POST" action="{{route('serie.destroy',$series->id)}}">
                            {{csrf_field()}}
                            @method('DELETE')      
                            <button type="submit" id="botonEliminar" class="btn-sm btn-danger mt-3"  onclick="return confirm('¿Quiere borrar la serie?')"><i class="far fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
 
        </table>
</div>
    <div id="panelAgregar">
        <a class="botonagregar" type="button" href="{{route('serie.create')}}">Agregar serie</a>
    </div>

    <div class="panelSeries">
         <h1 id="informacionUsuario">
            Listas Creadas
        </h1>
        <div class="container">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Series agregadas</th>
                    <th scope="col">¿Es publica?</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                 @foreach($lista as $listas)
                <tr>
                    <td>{{ $listas->nombre_lista}}</td>
                    @foreach($listas->seriesAsociadas as $series)               
                            <td>{{ $series->nombre}}</td>
                    @endforeach
                    <td>{{ $listas->publica}}</td>
                    <td>
                        <a class="btn-sm btn-info botoninput" href="{{route('listas.edit', $listas->id) }}"><i class="far fa-edit"></i></a>
                        <form method="POST" action="{{route('listas.destroy',$listas->id)}}">
                            {{csrf_field()}}
                            @method('DELETE')      
                            <button type="submit" id="botonEliminar" class="btn-sm btn-danger mt-3"  onclick="return confirm('¿Quiere borrar la lista?')"><i class="far fa-trash-alt"></i></button>
                        </form>
                    </td>
                @endforeach
                </tr>
            </tbody>
        </table>
        <a class="botonagregar" type="button" href="{{route('listas.create')}}">Crear Lista</a>
        <input type="hidden" name="id_usuario" value="{{ Auth::user()->id }}">
    </div>
@stop