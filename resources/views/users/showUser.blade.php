@extends('layouts.app')
@section('content')
<div class="container">
    <h1>{{$user->name}}</h1>
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
            <td><a href="{{ route('showAlbum',['id' => $album->id]) }}" class="btn btn-primary">Ver Album</a></td>
            @endforeach


        </tbody>

    </table>

  

</div>

@endsection
