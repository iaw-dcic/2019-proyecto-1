@extends('layouts.app')

@section('opcionesNavBar')
<li class="nav-item">
    <a class="nav-link" href='home'>Volver</a>
</li>
@endsection

@section('content')
<div class="container">
    <div class="panel-body">
         <h1>Ingrese los datos para crear un partido</h1>
        <!--Formulario para Crear un Partido -->
        <form action="{{ route('crearPartido') }}" method="POST" class="form-horizontal">
            <!--Para que funcione el formulario tiene que tener esto-->
            @csrf
            <!-- Display Validation Errors -->
            @include('errors')
            <!--Nombre del Partido-->
            <div class="form-group">
                <label for="inputAddress">Nombre</label>
                <input type="text" name="name" class="form-control" id="inputAddress">
            </div>
            <div class="form-row">
                <!--Lugar del Partido-->
                <div class="form-group col-md-6">
                    <label for="inputCity">Lugar</label>
                    <input type="text" name="place" class="form-control" id="inputCity">
                </div>
                <!--Categoria-->
                <div class="form-group col-md-4">
                    <label for="inputCategoria">Categoria</label>
                    <select id="inputCategoria" name="category" class="form-control">
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
                        <option>{{ $estado->visibilidad }}</option>
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
            
            <button type="submit" class="btn btn-primary">Crear Partido</button>
        </form>

    </div class="container">
    <script src="{{ asset('js/partido.js') }}"></script>
    @endsection