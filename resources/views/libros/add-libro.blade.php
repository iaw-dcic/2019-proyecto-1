@extends('layouts.appIndex')

@section('contenido')

    <div class="row">
        <form class="form-group" method="POST" action='{{route('store-libro',['id' => $id])}}'>
            @csrf
            <div class="form-group row">
                <label for="Titulo">Titulo</label>
                <input type="text" class="form-control" name='Titulo' id="Titulo"  placeholder="Titulo">
            </div>
            <div class="form-group row">
                <label for="Autor">Autor</label>
                <input type="text" class="form-control" name='Autor' id="Autor" placeholder="Autor">
            </div>
            <div class="form-group row">
                <label for="Genero">Genero</label>
                <input type="text" class="form-control" name='Genero' id="Genero"  placeholder="Genero">
            </div>
            <div class="form-group row">
                <label for="fechaPublicacion">Fecha de publicacion</label>
                <input class="form-control" type="date"  value="2019-01-01" name='FechaPublicacion'  id="FechaPublicacion">
            </div>
            <button type="submit" class="btn btn-primary">Añadir</button>
        </form>
    </div>
@endsection 