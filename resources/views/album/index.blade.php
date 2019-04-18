@extends('layouts.app')

@section('content')

<div class="container">
    <p>Albums</p>
    @if (! empty($users))
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Album</th>
      <th scope="col">Artista</th>
      <th scope="col">Link</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($users as $user)
    <tr>
      <th scope="row">1</th>
      <td>{{$user->name}}</td>
      <td>{{$user->bandName}}</td>
      <td>{{$user->link}}</td>
    </tr>
   @endforeach
  </tbody>
</table>
@endif
    <a href="{{ route('createAlbum') }}" class="btn btn-outline-success" role="button" aria-pressed="true">Agregar Album</a>
    

</div>


@endsection
