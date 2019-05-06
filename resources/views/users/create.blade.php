@extends('layouts.app')

<style>
    .crear:active{
        color: blue;
    }


</style>
@section('content')

    <div class="card">
        <h4 class="card-header"> Crear Lista </h4>
        <div class="card-body">
                        <!--Laravel pasa automaticamente la variable errors a la vista-->
                @if ($errors->any())
                <div class="alert alert-danger">
                        <h6>Por favor corrige los siguientes errores debajo:</h6>
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>
                                {{ $error}}
                            </li>
                            @endforeach
                        </ul>
                </div>
            @endif

            <form method="POST" action="{{ url('usuarios/crear') }}">
                {!! csrf_field() !!} <!--Laravel nos protoge para evitar que un sitio malicioso envia solicitudes post a nuestra app pidiendo este token-->

                <!--Uso Boostrap-->
                <div class="form-group">
                        <!-- Label usa el id del input --> <!-- el campo name es el que usa el metodo post en el controlador para crear el usuario -->
                        <label for="name">Nombre de la lista a crear:</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Juan Perez" value="{{ old('name') }}">
                </div>

                <div>

                </div>
                        <button type="submit" class = "btn btn-primary">Crear Lista</button>

                </div>
            </form>
                    </div>
              </div>


@endsection
