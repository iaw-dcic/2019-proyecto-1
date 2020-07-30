@extends('layouts.app')


@section('content')
    <div class="card" >
      <h4 class="card-header">Editar</h4>
      <div class="card-body">
        <!--Laravel pasa automaticamente la variable errors a la vista-->
        @if ($errors->any())
        <div class="alert alert-danger">
                <h4>Por favor corrige los siguientes errores debajo:</h4>
                @if ($errors->has('name'))
                    <p>{{ $errors->first('name') }}</p>
                @endif
                @if ($errors->has('email'))
                    <p>{{ $errors->first('email') }}</p>
                @endif
        </div>

        @endif




        <form method="POST" action="{{ url('usuarios/{$user->id}') }}">
            {{ method_field('PUT') }} <!--Paso el metodo correcto-->
            {!! csrf_field() !!} <!--Laravel nos protoge para evitar que un sitio malicioso envia solicitudes post a nuestra app pidiendo este token-->
            <div class="form-group">
                <!-- Label usa el id del input --> <!-- el campo name es el que usa el metodo post en el controlador para crear el usuario -->
                <label for="name">Nombre:</label>
                <input type="text" name="name" id="name" placeholder="Juan Perez" value="{{ old('name', $user->name) }}" class="form-control">
            </div>

            <div class="form-group">

                <label for="email">Email:</label>
                <input type="email" name="email" id="email" placeholder="juanperez@example.com" value="{{ old('email', $user->email) }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" name="password" id="password" placeholder="Mayor a 6 caracteres" class="form-control">
            </div>

            <div class="form-check">
                @if(old('activar2F',$user->activar2F==1))
                    <input type="checkbox" class="form-check-input" id="activar2F" name="activar2F" checked>
                @else
                    <input type="checkbox" class="form-check-input" id="activar2F" name="activar2F">
                @endif
                    <label class="form-check-label" for="exampleCheck1">Activar segundo factor de autenticación</label>
             </div>

            <button type="submit" class="btn btn-primary">Actualizar usuario</button>

        </form>
        </div>
    </div>




@endsection
