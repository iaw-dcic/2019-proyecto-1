@extends('layouts.app')

@section('content')

    <div class="container" id="bg-div">
      <div id="bg-div">
      @if (! empty($users))

      <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Album</th>
    </tr>
  </thead>
  <tbody>
  @foreach($users as $user )
    <tr>
      <th scope="row">1</th>
      <td>{{$user->name}}</td>
      <td>Album</td>

  @endforeach    
  </tbody>
</table>
@endif
      
      </div>

    
            
    </div>

@endsection

