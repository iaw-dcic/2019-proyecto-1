@extends('layouts.app')
@section('content')
<div class="container">
    <h1>{{$user->name}}</h1>
    <table id="albums">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre </th>
            <th>Link</th>
        </tr>
     </thead>

        <tbody>
        @foreach($albums as $album)
            <tr>
            <td>{{$album->id}}</td>
            <td>{{$album->name}}</td>
            <td>{{$album->link}}</td>
            </tr>
            @endforeach


        </tbody>

    </table>

  

</div>

@endsection
