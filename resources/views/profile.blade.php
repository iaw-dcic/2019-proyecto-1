@extends('layouts.app')
@section('content')
<div class="container">
<h1>{{$user->name}}</h1>


    <div class="row">
        <div class="col-8">
        <table id="albums">
    <thead>
        <tr>
            <th>ID</th>
            <th>Album</th>
            <th>Artista</th>
            <th>Link</th>
            <th></th>
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
            <td>
            <a href="{{ route('editAlbum', $album->id) }}" class="btn btn-outline-success" role="button" aria-pressed="true">Editar</a>
            </td>
            </tr>
            @endforeach


        </tbody>

    </table>



        </div>
        <div class="col-4">
        <div class="card float-right" style="width: 18rem;">
        <img class="card-img-top" src="/uploads/avatars/{{$user->avatar}}" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{$user->name}}</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
      
        <div class="card-body">
            <a href="{{ route('createAlbum') }}" class="card-link">Crear Album</a>
            <a href="{{route ('updateUser')}}" class="card-link">Editar Perfil</a>
        </div>
    </div>
        </div>
    </div>
    
    

    

</div>    
@endsection