@extends('main')

@section('title','Crear Cancion')

@section('content')

   <!-- Formulario de creacion de usuario  --> 
    <!--                 uso la ruta store para hacer el post del formulario -->
    <form method="POST" action="{{ action('CancionesController@store') }}">
            {{ csrf_field() }}
            <div class="field">
                <label class="label" for="nombre">Nombre</label>
                <div class="control">
                    <input type="text" class="input" name="nombre" placeholder="Nombre cancion">
                </div>
            </div>
    
            <div class="field">
                    <label class="label" for="duracion">Duracion</label>
                    <div class="control">
                        <input type="time" class="input" name="duracion" placeholder="Duracion" >
                    </div>
            </div>
        
            <div class="field">
                    <label class="label" for="album">Album</label>
                    <div class="control">
                        <input type="text" class="input" name="album" placeholder="Album">
                    </div>
                </div>
    
                <div class="field">
                        <label class="label" for="autor">Autor</label>
                        <div class="control">
                            <input type="text" class="input" name="autor" placeholder="Nombre Autor">
                        </div>
                    </div>


            <div class="field">
                    <div class="control">
                        <button type="submit" class="button btn-submit"> </button>
                    </div>
                </div>
    
        </form>
       
       
            @if ($errors->any())
            <div class="notification is-danger">
                    <ul>
                            @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                            @endforeach
                    </ul>
            </div>
            @endif
@endsection
