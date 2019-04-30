@extends('layouts.app')

@section('opcionesNavBar')
<li class="nav-item">
    <a class="nav-link" href='/listadoPartidos'>Volver</a>
</li>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1> Datos actuales del Partido</h2>
                </div>
                <div class="panel-body">
                    <form action="/edit/{{ $partido->id }}" method="POST" class="form-horizontal">
                        <!--Para que funcione el formulario tiene que tener esto-->
                        @csrf
                        <!-- Display Validation Errors -->
                        @include('errors')
                        <!--Nombre del Partido-->
                        <div class="form-group">
                            <label for="inputAddress">Nombre</label>
                            <input type="text" name="name" class="form-control" id="name" value='{{$partido->name}}'>
                        </div>
                        <div class="form-row">
                            <!--Lugar del Partido-->
                            <div class="form-group col-md-6">
                                <label for="inputCity">Lugar</label>
                                <input type="text" name="place" class="form-control" id="place" value='{{$partido->place}}'>
                            </div>
                            <!--Categoria-->
                            <div class="form-group col-md-4">
                                <label for="inputCategoria">Categoria</label>
                                <select id="inputCategoria" name="category" class="form-control">
                                    <option selected>{{$partido->category}}</option>
                                    @foreach($categories as $category)
                                    <option>{{$category->category}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!--Estado de Lista-->
                            <div class="form-group col-md-4">
                                <label for="inputState">Estado</label>
                                <select id="inputState" name="public" class="form-control">
                                    @foreach($estados as $estado)
                                    <option>{{$estado->visibilidad}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <h2> Participantes añadidos</h2>
                        <div id="containerParticipantes">

                        </div>
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" class="form-control" id="inputParticipante">
                            <button type="button" class="btn btn-success" onClick="agregarParticipante()">Agregar jugador</button>
                        </div>

                        <button type="submit" class="btn btn-primary">Actualizar Datos</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="container">
    <h2>Listado de Jugadores Actuales</h2>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jugadores as $jugador)
                <tr>
                    <td>{{$jugador->id}}</td>
                    <td>{{$jugador->name}}</td>
                    <td>
                        <form action="/edit/jugador/{{$jugador->id}}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button>Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="{{ asset('js/partido.js') }}"></script>
    @endsection