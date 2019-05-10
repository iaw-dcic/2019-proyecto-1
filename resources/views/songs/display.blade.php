@extends('layouts.app')
@section('content')
<div class="container">
    <h1>{{$album->name}}</h1>
    <table id="albums">
    <thead>
        <tr>
            <th>Cancion</th>
            <th>Link</th>
            <th></th>
            <th></th>
        </tr>
     </thead>

        <tbody>
        @foreach($songs as $song)
            <tr>
            <td>{{$song->song_name}}</td>
            <td>{{$song->link}}</td>
            <td><a href="{{ route('editSong',['id' => $song->id]) }}" class="btn btn-outline-success">Editar</a></td>
            <td><a onclick="return confirm('Are you sure you want to Remove?');" href="{{ route('destroySong',['id' => $song->id]) }}" class="btn btn-outline-success">Eliminar</a></td>

        @endforeach


        </tbody>

    </table>
    <br>
    <a href="{{ route('createSongs',['id' => $album->id]) }}" class="btn btn-primary">Agregar más canciones</a>

  

    
</div>

@endsection
