@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{$album->name}}</h1>
    <br>
    <h2>Artista : {{$album->bandName}}</h2>
    <br>
    <p>Valoración : {{$album->description}}</p>

    <table id="albums">
    <thead>
        <tr>
            <th>Cancion</th>
            <th>Link</th>
          
        </tr>
     </thead>

        <tbody>
        @foreach($album->songs as $song)
            <tr>
            <td>{{$song->song_name}}</td>
            <td>{{$song->link}}</td>
            </tr>
            
            @endforeach


        </tbody>

    </table>



    <a href="{{ route('showUser',['id' => $album->user_id]) }}" class="btn btn-primary">Atras</a>

</div>


@endsection
