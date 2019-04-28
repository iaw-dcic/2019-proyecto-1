@extends('main')

@section('title','Crear Lista')

@section('content')

     <!-- Mensaje flash  --> 
    @if ($errors->any())
    <div class="alert  alert-danger" role="alert">
            <ul>
                    @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                    @endforeach
            </ul>
    </div>
    @endif



   <!-- Formulario de creacion de lista  --> 
    <!--                 uso la ruta store para hacer el post del formulario -->
    <form method="POST" action="{{ action('ListasController@store') }}">
                {{ csrf_field() }}
            <div class="field">
                <label class="label" for="nombre">Nombre</label>
                <div class="control">
                    <input type="text" class="input {{ $errors->has('nombre') ? 'is-danger' :'' }}" name="nombre" placeholder="Nombre Lista">
                </div>
            </div>
    
            <div class="field">
                    <label class="label" for="descripcion">Descripcion</label>
                    <div class="control">
                        <input type="text" class="input {{ $errors->has('descripcion') ? 'is-danger' :''}}" name="descripcion" placeholder="Descripcion" >
                    </div>
            </div>
        
            <div class="field">
                <label class="label" for="nombre">Visibilidad</label>
                <div class="control">
                        <input type="radio" class="input" name="visible" value="2" checked> Pública 
                        <input type="radio" class="input" name="visible" value="0"> Privada<br>
                </div>
            </div>

            <div>
                <button class="btn btn-success my-2 my-sm-0" type="submit">Agregar Lista</button>
            </div>
        </form>
@endsection
