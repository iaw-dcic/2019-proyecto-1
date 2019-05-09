@extends('layouts.app')
@section('content')
<div class="container">
<h1>{{$user->name}}</h1>


    <div class="row">
        <div class="col-lg-8 col-md-12 mr-auto" col-sm>
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
            <td><a href="{{ route('displaySongs', $album->id) }}" class="btn btn-outline-success" role="button" aria-pressed="true">{{$album->name}}</a></td>
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
        <div class="col-lg-4  col-md-12 mr-auto" >
        <div class="card float-right" style="width: 18rem;">
        <img class="card-img-top" src="/uploads/avatars/{{$user->avatar}}" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{$user->name}}</h5>
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