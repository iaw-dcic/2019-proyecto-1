@extends('layouts.app')

@section('content')

<div class="container">
    <p>Albums</p>
    <img class="card-img" src="/images/main.jpg" alt="Card image">
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
  @foreach ($albums as $album)
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
    

</div>


@endsection
