@extends('main')

@section('title','Crear Cancion')

@section('content')
    <br>
    <h1>Crear Canción</h1>

   <!-- Formulario de creacion de cancion  --> 
    <!--                 uso la ruta store para hacer el post del formulario -->
    <form method="POST" action="{{ action('CancionesController@store',$lista) }}">
            {{ csrf_field() }}
            <div class="field">
                <label class="label" for="nombre">Nombre</label>
                <div class="control">
                    <input type="text" class="input" name="nombre" placeholder="Nombre cancion">
                </div>
            </div>
    
            <div class="field">
                    <label class="label" for="duracion">Duración</label>
                    <div class="control">
                        <input type="time" class="input" name="duracion" placeholder="Duración" >
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
                    <label class="label" for="fecha_lanzamiento">Fecha lanzamiento (opcional)</label>
                    <div class="control">
                        <input type="date" class="input" name="fecha_lanzamiento" placeholder="aaaa-mm-dd">
                    </div>
            </div>



            <br>
            <button class="btn btn-success my-2 my-sm-0" type="submit">Agregar Canción</button>
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
