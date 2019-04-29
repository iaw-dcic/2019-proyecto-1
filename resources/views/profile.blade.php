@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

        <form enctype="multipart/form-data" action="/profile" method="POST">
            <img src="/uploads/avatars/{{$user->avatar}}" id="img-cir">
            <h2>{{$user->name}}</h2>
            <label>Update Profile Image</label>
            <br>
            <input type="file" name="avatar">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="submit" class="float-right btn btn-sm btn-primary">
        </form>
        </div>
    </div>

    <table id="albums">
    <thead>
        <tr>
            <th>ID</th>
            <th>Album</th>
            <th>Artista</th>
            <th>Link</th>
            <th></th>
        </tr>
     </thead>

        <tbody>
        @foreach($albums as $album)
            <tr>
            <td>{{$album->id}}</td>
            <td>{{$album->name}}</td>
            <td>{{$album->bandName}}</td>
            <td>{{$album->link}}</td>
            <td>
            <a href="{{ route('eliminarAlbum', $album->id) }}" class="btn btn-outline-success" role="button" aria-pressed="true">Eliminar</a>
            </td>
            </tr>
            @endforeach


        </tbody>

    </table>

    <a href="{{ route('createAlbum') }}" class="btn btn-outline-success" role="button" aria-pressed="true">Agregar Nuevo Album</a>


</div>    
@endsection