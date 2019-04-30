@extends('main')

@section('title','Editar Canción')

@section('content')
        <br>
        <h1>Editar Canción</h1>

    <!-- usa metodo             POST                    y on submit redirige a /listas  -->                       
                                <!-- cancion es el nuevo request, id es la cancion a modificar -->
    <form method="POST" action="{{ action('CancionesController@update',$cancion,$id) }}">
        {{ csrf_field() }}
            {{  method_field('PATCH') }}
           
        <div class="field">
            <label class="label" for="nombre">Nombre Canción *</label>
            <div class="control">
                <input type="text" class="input" name="nombre" value='{{$cancion->nombre}}'>
            </div>
        </div>

        <br>
        <div class="field">
                <label class="label" for="duracion">Duración (hh:mm:ss) *</label>
                <div class="control">
                    <input type="time" class="input" name="duracion" value="{{$cancion->duracion}}"">
                </div>
        </div>

        <br>
        <div class="field">
                <label class="label" for="album">Album *</label>
                <div class="control">
                    <input type="text" class="input" name="album" value='{{$cancion->album}}'>
                </div>
        </div>

        <br>
        <div class="field">
                <label class="label" for="autor">Autor *</label>
                <div class="control">
                    <input type="text" class="input" name="autor" value='{{$cancion->autor}}'>
                </div>
        </div>

        <br>
        <div class="field">
                <label class="label" for="fecha_lanzamiento">Fecha lanzamiento</label>
                <div class="control">
                    <input type="date" class="input" name="fecha_lanzamiento" value='{{$cancion->fecha_lanzamiento}}'>
                </div>
        </div>

        <br>

        <div>
                <button class="btn btn-success my-2 my-sm-0" type="submit">Aplicar cambios</button>
        </div>
    </form>

    <br><br><br>
@endsection