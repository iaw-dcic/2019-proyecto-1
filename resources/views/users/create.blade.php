@extends('layouts.app')


@section('content')



    <div class="card">
        <h4 class="card-header"> Crear Lista </h4>
        <div class="card-body">
            <!--Laravel pasa automaticamente la variable errors a la vista-->

            <form method="POST" action="{{ url('usuarios/crear') }}">
                {!! csrf_field() !!} <!--Laravel nos protoge para evitar que un sitio malicioso envia solicitudes post a nuestra app pidiendo este token-->

                <!--Uso Boostrap-->
                <div class="form-group">
                        <!-- Label usa el id del input --> <!-- el campo name es el que usa el metodo post en el controlador para crear el usuario -->
                        <label for="name">Nombre de la lista a crear:</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Mi Lista" value="{{ old('name') }}">
                        @if($errors->has('name'))
                        <div class="alert alert-danger">
                            <p>{{ $errors->first('name') }}</p>
                        </div>
                        @endif

                </div>
                <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="isPublic" name="isPublic">
                        <label class="form-check-label" for="exampleCheck1">Es pública</label>
                 </div>

                <div>

                      <button type="submit" class = "btn btn-primary">Crear Lista</button>

                </div>
            </form>
        </div>
    </div>


@endsection
